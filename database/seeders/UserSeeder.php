<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Отключаем observer, если он мешает созданию пользователя
        Event::forget('eloquent.creating: ' . User::class);

        // Создание суперпользователя
        $superuser = User::create([
            'name' => 'Ota',
            'user_slug' => 'ota',
            'email' => 'ota@example.com',
            'password' => bcrypt('password'),
        ]);
        $superuser->assignRole('superuser');

        // Создание обычного пользователя
        $user = User::create([
            'name' => 'Regular User',
            'user_slug' => 'regular-user',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('user');
    }
}
