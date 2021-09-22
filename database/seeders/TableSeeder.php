<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TableSeeder extends Seeder
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
            'assessment_label_id' => 14,
            'parent_id' => 6,
            'slug' => 'Digital-Strategy',
            'name' => 'Digital Strategy',
            'description' => 'description',
        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 7,
            'slug' => 'crm-ecrm',
            'name' => 'CRM/eCRM',
            'description' => 'description',

        ]);



        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'ePay',
            'name' => 'ePay(i.e. Tax, Tickets)',
            'description' => 'description',

        ]);


        
        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'ebook',
            'name' => 'EBook',
            'description' => 'description',

        ]);


        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'eRequest',
            'name' => 'eRequest',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'ePlan',
            'name' => 'ePlan',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'eEngage',
            'name' => 'eEngage',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'open',
            'name' => 'Open Data',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'Pingstreet',
            'name' => 'Pingstreet',
            'description' => 'description',

        ]);

        DB::table('assessments')->insert([
            'assessment_type_id' => 1,
            'assessment_label_id' => 14,
            'parent_id' => 8,
            'slug' => 'Mailings',
            'name' => 'Mailings',
            'description' => 'description',

        ]);






    }
}
