<?php

namespace App\Http\Controllers;

use App\Dto\User\ExecutorsSearchUserDto;
use App\Dto\User\ExecutorsUserDto;
use App\Dto\User\FormCreateUserDto;
use App\Dto\User\FormDeleteSubjectDto;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserPasswordChangeRequest;
use App\Http\Requests\UserSettingsEditRequest;
use App\Http\Requests\WorkerFormCreateRequest;
use App\Http\Requests\WorkerFormUpdateRequest;
use App\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use App\Services\User\ExecutorProfileUserService;
use App\Services\User\ExecutorsSearchUserService;
use App\Services\User\ExecutorsUserService;
use App\Services\User\FormCreateUserService;
use App\Services\User\FormDeleteSubjectUserService;
use App\Services\User\ProfileSettingsUpdateService;
use App\Services\User\UserPasswordChangeService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use App\Models\Post;
use App\Models\Subject;
use App\Enums\UserRolesEnum;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct(private IUserRepository $repository)
    {
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function profile()
    {
        $acceptedPosts = auth()->user()->myAcceptedPosts->map(function ($post) {
            $post->executor = User::find($post->pivot->executor_id);
            return $post;
        });
        return view('pages.profile', [
            'user' => auth()->user(),
            'myPosts' => auth()->user()->posts,
            'myAcceptedPosts' => $acceptedPosts,
            'myTasks' => auth()->user()->tasks,
        ]);
    }

    public function formCreateShow(int $id)
    {
        $user = auth()->user();
        return view('pages.workerform', [
            'user' => $user,
            'subjectsArr' => $user->subjects()->get(),
            'subjects' => Subject::get()
        ]);
    }

    public function formCreate(WorkerFormCreateRequest $request, int $id, FormCreateUserService $service)
    {
        $dto = new FormCreateUserDto(
            userId: $id,
            subjectsArr: $request->subjects,
            description: $request->description,
            contactLink: $request->contact_link,
            cardNumber: $request->card_number,
        );
        $service->run(User::find($id), $dto);
        return redirect()->route('user.profile-form', $id);
    }

    public function formUpdate(WorkerFormUpdateRequest $request, int $id, FormCreateUserService $service)
    {
        $dto = new FormCreateUserDto(
            userId: $id,
            subjectsArr: $request->subjects,
            description: $request->description,
            contactLink: $request->contact_link,
            cardNumber: $request->card_number,
        );
        $service->run($this->repository->find($id), $dto);
        return redirect()->route('user.profile-form', $id);
    }

    public function formDeleteSubject(int $userSubjectId, FormDeleteSubjectUserService $service): RedirectResponse
    {
        $dto = new FormDeleteSubjectDto(
            userId: auth()->user()->id,
            userSubjectId: $userSubjectId
        );
        $service->run($dto);
        return redirect()->route('user.profile-form', auth()->user()->id);
    }

    public function executors(ExecutorsUserService $service): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.executors', $service->run());
    }

    public function executorSearch(Request $request, ExecutorsSearchUserService $service): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.executorsearch', $service->run($request->input('subjects')));

    }

    public function executorProfile(int $id, ExecutorProfileUserService $service)
    {
        $executor = $this->repository->find($id);
        if ($service->run($id)) {
            return view(('pages.executorprofile'), [
                'executor' => $executor,
                'user' => auth()->user(),
                'reviews' => $executor->reviewsReceived()->get()->reverse(),
            ]);
        } else {
            abort(404);
        }
    }

    public function profileSettings(User $user)
    {
        return view('pages.settings', [
            'user' => $user
        ]);
    }

    public function profileSettingsPassword(UserPasswordChangeRequest $request, User $user, UserPasswordChangeService $service)
    {
        $data = $request->validated();
        if ($service->run($user, $data)) {
            return redirect()->back()->with('error', 'Пароль неверный!');
        }
        return redirect()->route('user.profile-settings', [
            'user' => $user,
        ]);
    }

    public function profileSettingsEdit(UserSettingsEditRequest $request, User $user)
    {
        $user->fill($request->validated());
        $user->save();

        return redirect()->route('user.profile-settings', [
            'user' => $user,
        ]);

    }

    public function testMaxim()
    {
        Auth::login(User::find(100), true);
        return redirect()->route('main');
    }

    public function testOleg()
    {
        Auth::login(User::find(228), true);
        return redirect()->route('main');
    }


}
