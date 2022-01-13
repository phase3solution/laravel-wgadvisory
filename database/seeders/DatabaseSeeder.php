<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $this->call([UsersTableSeeder::class]);
        // $this->call([AssessmentSeeder::class]);
        //$this->call([AssessmentTypeSeeder::class]);
        // $this->call([AssessmentLabelSeeder::class]);

    }
}
