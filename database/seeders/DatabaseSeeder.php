<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Distribution;
use App\Models\Report;
use App\Models\User;
use Database\Factories\DestinationFactory;
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
        Destination::factory()->count(5)->create();
        Report::factory()->count(250)->create();
        Distribution::factory()->count(1000)->create();
    }
}
