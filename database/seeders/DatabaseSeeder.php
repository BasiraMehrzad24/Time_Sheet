<?php

namespace Database\Seeders;

use App\Models\DailyReport;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->hasAttached(Project::factory()->count(10), ['role' => 'admin'])
            ->create();

        User::factory()
            ->hasAttached(Project::factory()->count(5), ['role' => 'admin'])
            ->create([
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'super_admin' => true,
            ]);


        DailyReport::withoutEvents(function () {
            DailyReport::factory(100)->create();
        });
    }
}
