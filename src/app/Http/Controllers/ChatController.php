<?php

namespace App\Http\Controllers;

use App\Dto\Chat\CreateChatDto;
use App\Dto\Chat\SendMessageDto;
use App\Events\MessageSent;
use App\Http\Requests\MessageFormRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use App\Repositories\ChatRepository;
use App\Services\Chat\CreateChatService;
use App\Services\Chat\SendMessageService;


class ChatController extends Controller
{
    protected ChatRepository $repository;

    public function __construct(ChatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function chatCreate(Post $post, CreateChatService $service, int $executorId = null)
    {
        if ($executorId !== null) {
            $dto = new CreateChatDto(
                userId: auth()->user()->id,
                buddyId: $executorId,
            );
        } else {
            $dto = new CreateChatDto(
                userId: auth()->user()->id,
                buddyId: $post->user->id
            );
        }
        $chatId = $service->run($dto->getData());
        return redirect()->route('chat', ['id' => $chatId]);
    }

    public function chats(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $chats = auth()->user()->allChats()->all();
        return view('pages.inbox', [
            'chats' => $chats,
            'user' => auth()->user()
        ]);
    }

    public function chat(int $chatId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $messages = $this->repository->getWithUser(Chat::find($chatId));
        return view('pages.chat', [
            'user' => auth()->user(),
            'messages' => $messages,
        ]);
    }

    public function chatMessages(int $id): \Illuminate\Http\JsonResponse|array|\Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->getMessageWithUser($id);
    }

    public function chatSend(int $id, MessageFormRequest $request, SendMessageService $service): \Illuminate\Http\JsonResponse|Message
    {
        $dto = new SendMessageDto(
            chatId: $id,
            userId: $request->user()->id,
            message: $request->input('message'),
        );
        $message = $service->run($dto, $request, $id);
        broadcast(new MessageSent($request->user(), $message));
        return $message;
    }
}
