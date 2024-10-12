<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRolesEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new SubjectSeeder())->run();
        (new UserSeeder())->run();
        (new PostSeeder())->run();
//        (new ChatSeeder())->run();
    }
}
