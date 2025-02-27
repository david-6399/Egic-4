<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\comment;
use App\Models\debouche;
use App\Models\event;
use App\Models\program;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\typeFormation::factory(10)->create();
        \App\Models\formation::factory(10)->create();
        program::factory(10)->create();
        event::factory(10)->create();
        debouche::factory(10)->create();

        
        
        comment::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
