<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Type::truncate();
        Project::truncate();
        Event::truncate();
        Location::truncate();

        // Create specific users
        User::create([
            'first' => 'Admin',
            'last' => 'User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ]);

        // Create additional random users
        User::factory()->count(1)->create();

        // Create specific types
        $types = [
            ['title' => 'Webinar'],
            ['title' => 'Concert'],
            ['title' => 'Lecture'],
            ['title' => 'Sports'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }

        // Create other data
        Project::factory()->count(4)->create();
        Event::factory()->count(4)->create();
        Location::factory()->count(4)->create();
    }
}
