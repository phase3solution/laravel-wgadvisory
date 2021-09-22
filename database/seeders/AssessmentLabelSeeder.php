<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentLabelSeeder extends Seeder
{
    public function run()
    {
        DB::table('assessment_labels')->delete();


        // 1 MTA 
        DB::table('assessment_labels')->insert([
            'id' => 1,
            'assessment_type_id' => 1,
            'slug' => 'general',
            'name' => 'General',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);


        // 1 MTA
        DB::table('assessment_labels')->insert([
            'id' => 2,
            'assessment_type_id' => 1,
            'slug' => 'area',
            'name' => 'Area',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);


         // 1 MTA
         DB::table('assessment_labels')->insert([
            'id' => 3,
            'assessment_type_id' => 1,
            'slug' => 'sections',
            'name' => 'Sections',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 1 MTA
        DB::table('assessment_labels')->insert([
            'id' => 4,
            'assessment_type_id' => 1,
            'slug' => 'tables',
            'name' => 'Tables',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 1 MTA
        DB::table('assessment_labels')->insert([
            'id' => 5,
            'assessment_type_id' => 1,
            'slug' => 'questions',
            'name' => 'Questions',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);



        // 2 MTA Register
        DB::table('assessment_labels')->insert([
            'id' => 6,
            'assessment_type_id' => 2,
            'slug' => 'general',
            'name' => 'Generals',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 2 MTA Register
        DB::table('assessment_labels')->insert([
            'id' => 7,
            'assessment_type_id' => 2,
            'slug' => 'areas',
            'name' => 'Areas',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 2 MTA Register
        DB::table('assessment_labels')->insert([
            'id' => 8,
            'assessment_type_id' => 2,
            'slug' => 'threats',
            'name' => 'Threats',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);


        // 2 MTA Register
        DB::table('assessment_labels')->insert([
            'id' => 9,
            'assessment_type_id' => 3,
            'slug' => 'subthreats',
            'name' => 'Subthreats',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);





        // 3 IHC 
        DB::table('assessment_labels')->insert([
            'id' => 10,
            'assessment_type_id' => 1,
            'slug' => 'general',
            'name' => 'General',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);


        //3 IHC 
        DB::table('assessment_labels')->insert([
            'id' => 11,
            'assessment_type_id' => 1,
            'slug' => 'area',
            'name' => 'Area',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);


         // 3 IHC 
         DB::table('assessment_labels')->insert([
            'id' => 12,
            'assessment_type_id' => 3,
            'slug' => 'sections',
            'name' => 'Sections',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 3 IHC 
        DB::table('assessment_labels')->insert([
            'id' => 13,
            'assessment_type_id' => 3,
            'slug' => 'tables',
            'name' => 'Tables',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 3 IHC 
        DB::table('assessment_labels')->insert([
            'id' => 14,
            'assessment_type_id' => 3,
            'slug' => 'questions',
            'name' => 'Questions',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);




        // 4 IHC Register
        DB::table('assessment_labels')->insert([
            'id' => 15,
            'assessment_type_id' => 4,
            'slug' => 'general',
            'name' => 'Generals',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 4 IHC Register
        DB::table('assessment_labels')->insert([
            'id' => 16,
            'assessment_type_id' => 4,
            'slug' => 'areas',
            'name' => 'Areas',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

        // 4 IHC Register
        DB::table('assessment_labels')->insert([
            'id' => 17,
            'assessment_type_id' => 4,
            'slug' => 'threats',
            'name' => 'Threats',
            'description' => NULL,
            'status'=> true,
            'created_by' => Auth::id() 
        ]);

    // 5 IT Management 
    DB::table('assessment_labels')->insert([
        'id' => 18,
        'assessment_type_id' => 5,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //5 IT Management 
    DB::table('assessment_labels')->insert([
        'id' => 19,
        'assessment_type_id' => 5,
        'slug' => 'area',
        'name' => 'Area',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 5 IT Management 
     DB::table('assessment_labels')->insert([
        'id' => 20,
        'assessment_type_id' => 5,
        'slug' => 'sections',
        'name' => 'Sections',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 5 IT Management 
    DB::table('assessment_labels')->insert([
        'id' => 21,
        'assessment_type_id' => 5,
        'slug' => 'tables',
        'name' => 'Tables',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 5 IT Management
    DB::table('assessment_labels')->insert([
        'id' => 22,
        'assessment_type_id' => 5,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 6 Colud Readiness
    DB::table('assessment_labels')->insert([
        'id' => 23,
        'assessment_type_id' => 6,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //6 Colud Readiness
    DB::table('assessment_labels')->insert([
        'id' => 24,
        'assessment_type_id' => 6,
        'slug' => 'area',
        'name' => 'Area',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 6 Colud Readiness
     DB::table('assessment_labels')->insert([
        'id' => 25,
        'assessment_type_id' => 6,
        'slug' => 'sections',
        'name' => 'Sections',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 6 Colud Readiness
    DB::table('assessment_labels')->insert([
        'id' => 26,
        'assessment_type_id' => 6,
        'slug' => 'tables',
        'name' => 'Tables',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 6 Colud Readiness
    DB::table('assessment_labels')->insert([
        'id' => 27,
        'assessment_type_id' => 6,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 7 BIA
    DB::table('assessment_labels')->insert([
        'id' => 28,
        'assessment_type_id' => 7,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //7 BIA
    DB::table('assessment_labels')->insert([
        'id' => 29,
        'assessment_type_id' => 7,
        'slug' => 'departments',
        'name' => 'Departments',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 7 BIA
     DB::table('assessment_labels')->insert([
        'id' => 30,
        'assessment_type_id' => 7,
        'slug' => 'services',
        'name' => 'Services',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 8 Risk 
    DB::table('assessment_labels')->insert([
        'id' => 31,
        'assessment_type_id' => 8,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //8 Risk 
    DB::table('assessment_labels')->insert([
        'id' => 32,
        'assessment_type_id' => 8,
        'slug' => 'threat cats',
        'name' => 'Threat Cats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 8 Risk 
     DB::table('assessment_labels')->insert([
        'id' => 33,
        'assessment_type_id' => 8,
        'slug' => 'threats',
        'name' => 'Threats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 8 Risk
    DB::table('assessment_labels')->insert([
        'id' => 34,
        'assessment_type_id' => 8,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 9 BCP 
    DB::table('assessment_labels')->insert([
        'id' => 35,
        'assessment_type_id' => 9,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //9 BCP 
    DB::table('assessment_labels')->insert([
        'id' => 36,
        'assessment_type_id' => 9,
        'slug' => 'threat cats',
        'name' => 'Threat Cats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 9 BCP 
     DB::table('assessment_labels')->insert([
        'id' => 37,
        'assessment_type_id' => 9,
        'slug' => 'threats',
        'name' => 'Threats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 9 BCP
    DB::table('assessment_labels')->insert([
        'id' => 38,
        'assessment_type_id' => 9,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 9 BCP
    DB::table('assessment_labels')->insert([
        'id' => 39,
        'assessment_type_id' => 9,
        'slug' => 'threat cat questions',
        'name' => 'Threat Cat Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    
    // 10 Facility Risk 
    DB::table('assessment_labels')->insert([
        'id' => 40,
        'assessment_type_id' => 10,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 10 Facility Risk
    DB::table('assessment_labels')->insert([
        'id' => 41,
        'assessment_type_id' => 10,
        'slug' => 'facilities',
        'name' => 'Facilities',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //10 Facility Risk 
    DB::table('assessment_labels')->insert([
        'id' => 42,
        'assessment_type_id' => 10,
        'slug' => 'threat cats',
        'name' => 'Threat Cats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 10 Facility Risk 
     DB::table('assessment_labels')->insert([
        'id' => 43,
        'assessment_type_id' => 10,
        'slug' => 'statements',
        'name' => 'Statements',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 10 Facility Risk
    DB::table('assessment_labels')->insert([
        'id' => 44,
        'assessment_type_id' => 10,
        'slug' => 'statement questions',
        'name' => 'Statement Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 11 Cloud Vendor Risk 
    DB::table('assessment_labels')->insert([
        'id' => 45,
        'assessment_type_id' => 11,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 11 Cloud Vendor Risk
    DB::table('assessment_labels')->insert([
        'id' => 46,
        'assessment_type_id' => 11,
        'slug' => 'vendor',
        'name' => 'Vendor',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //11 Cloud Vendor Risk 
    DB::table('assessment_labels')->insert([
        'id' => 47,
        'assessment_type_id' => 11,
        'slug' => 'primary domains',
        'name' => 'Primary Domains',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 11 Cloud Vendor Risk 
     DB::table('assessment_labels')->insert([
        'id' => 48,
        'assessment_type_id' => 11,
        'slug' => 'control domains',
        'name' => 'Control Domains',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 11 Cloud Vendor Risk
    DB::table('assessment_labels')->insert([
        'id' => 49,
        'assessment_type_id' => 11,
        'slug' => 'statemens',
        'name' => 'Statements',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 11 Cloud Vendor Risk
    DB::table('assessment_labels')->insert([
        'id' => 50,
        'assessment_type_id' => 11,
        'slug' => 'statement questions',
        'name' => 'Statement Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 12 Cloud Maturity 
    DB::table('assessment_labels')->insert([
        'id' => 51,
        'assessment_type_id' => 12,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 12 Cloud Maturity
    DB::table('assessment_labels')->insert([
        'id' => 52,
        'assessment_type_id' => 12,
        'slug' => 'categories',
        'name' => 'Categories',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 12 Cloud Maturity 
     DB::table('assessment_labels')->insert([
        'id' => 53,
        'assessment_type_id' => 12,
        'slug' => 'domains',
        'name' => 'Domains',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 12 Cloud Maturity
    DB::table('assessment_labels')->insert([
        'id' => 54,
        'assessment_type_id' => 12,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 13 Cybersecurity Maturity 
    DB::table('assessment_labels')->insert([
        'id' => 55,
        'assessment_type_id' => 13,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);



     // 13 Cybersecurity Maturity 
     DB::table('assessment_labels')->insert([
        'id' => 56,
        'assessment_type_id' => 13,
        'slug' => 'function',
        'name' => 'Function',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);



    // 13 Cybersecurity Maturity
    DB::table('assessment_labels')->insert([
        'id' => 57,
        'assessment_type_id' => 13,
        'slug' => 'categories',
        'name' => 'Categories',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 13 Cybersecurity Maturity
    DB::table('assessment_labels')->insert([
        'id' => 58,
        'assessment_type_id' => 13,
        'slug' => 'control statements',
        'name' => 'Categories Statements',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    
    // 13 Cybersecurity Maturity
    DB::table('assessment_labels')->insert([
        'id' => 59,
        'assessment_type_id' => 13,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 14 DRM
    DB::table('assessment_labels')->insert([
        'id' => 60,
        'assessment_type_id' => 14,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //14 DRM
    DB::table('assessment_labels')->insert([
        'id' => 61,
        'assessment_type_id' => 14,
        'slug' => 'area',
        'name' => 'Area',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 14 DRM
     DB::table('assessment_labels')->insert([
        'id' => 62,
        'assessment_type_id' => 14,
        'slug' => 'sections',
        'name' => 'Sections',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 14 DRM
    DB::table('assessment_labels')->insert([
        'id' => 63,
        'assessment_type_id' => 14,
        'slug' => 'tables',
        'name' => 'Tables',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 14 DRM 
    DB::table('assessment_labels')->insert([
        'id' => 64,
        'assessment_type_id' => 14,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 15 DRM Register
    DB::table('assessment_labels')->insert([
        'id' => 65,
        'assessment_type_id' => 15,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //15 DRM Register
    DB::table('assessment_labels')->insert([
        'id' => 66,
        'assessment_type_id' => 15,
        'slug' => 'areas',
        'name' => 'Areas',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 15 DRM Register
     DB::table('assessment_labels')->insert([
        'id' => 67,
        'assessment_type_id' => 15,
        'slug' => 'threats',
        'name' => 'Threats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 16 Document Libary>>>>> Emty



     // 17 DMM
    DB::table('assessment_labels')->insert([
        'id' => 68,
        'assessment_type_id' => 17,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //17 DMM
    DB::table('assessment_labels')->insert([
        'id' => 69,
        'assessment_type_id' => 17,
        'slug' => 'areas',
        'name' => 'Areas',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 17 DMM
     DB::table('assessment_labels')->insert([
        'id' => 70,
        'assessment_type_id' => 17,
        'slug' => 'sections',
        'name' => 'Sections',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 17 DMM
    DB::table('assessment_labels')->insert([
        'id' => 71,
        'assessment_type_id' => 17,
        'slug' => 'tables',
        'name' => 'Tables',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);

    // 17 DMM 
    DB::table('assessment_labels')->insert([
        'id' => 72,
        'assessment_type_id' => 17,
        'slug' => 'questions',
        'name' => 'Questions',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);



    // 18 DMM Register 
    DB::table('assessment_labels')->insert([
        'id' => 73,
        'assessment_type_id' => 18,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //18 DMM Register
    DB::table('assessment_labels')->insert([
        'id' => 74,
        'assessment_type_id' => 18,
        'slug' => 'areas',
        'name' => 'Areas',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 18 DMM Register
     DB::table('assessment_labels')->insert([
        'id' => 75,
        'assessment_type_id' => 18,
        'slug' => 'threats',
        'name' => 'Threats',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


     // 19 ITCL MTA 
    DB::table('assessment_labels')->insert([
        'id' => 76,
        'assessment_type_id' => 19,
        'slug' => 'general',
        'name' => 'General',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    //19 ITCL MTA
    DB::table('assessment_labels')->insert([
        'id' => 77,
        'assessment_type_id' => 19,
        'slug' => 'areas',
        'name' => 'Areas',
        'description' => NULL,
        'status'=> true,
        'created_by' => Auth::id() 
    ]);


    // 20 SFIA Register Emty



    }
}
