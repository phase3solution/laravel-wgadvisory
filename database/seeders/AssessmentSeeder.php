<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use DB;
class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 2,
            'slug' => 'Web-Digital',
            'name' => 'Web/Digital',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 2,
            'slug' => 'Customer-Relationship-Management',
            'name' => 'Customer Relationship Management',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 2,
            'slug' => 'Digital-Solution',
            'name' => 'Digital Solution',
            'description' => 'description',

        ]);



        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 3,
            'slug' => 'Integration',
            'name' => 'Integration',
            'description' => 'description',

        ]);




        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 4,
            'slug' => 'Enterprise-Systems',
            'name' => 'Enterprise Systems',
            'description' => 'description',

        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 4,
            'slug' => 'Expert-Systems',
            'name' => 'Expert Systems',
            'description' => 'description',

        ]);



        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 5,
            'slug' => 'Operations',
            'name' => 'Operations',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 5,
            'slug' => 'Hardware',
            'name' => 'Hardware',
            'description' => 'description',

        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 5,
            'slug' => 'Software',
            'name' => 'Software',
            'description' => 'description',

        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 5,
            'slug' => 'Network',
            'name' => 'Network',
            'description' => 'description',

        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 13,
            'parent_id' => 5,
            'slug' => 'Data-Management',
            'name' => 'Data Management',
            'description' => 'description',

        ]);





        
    }
}
