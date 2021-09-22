<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentTypeSeeder extends Seeder
{

    public function run()
    {


      DB::table('assessment_types')->delete();



        DB::table('assessment_types')->insert([
            'id' => 1,
            'slug' => 'mta',
            'name' => 'MTA',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 2,
            'slug' => 'mta-register',
            'name' => 'MTA Register',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 3,
            'slug' => 'IHC',
            'name' => 'IHC',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 4,
            'slug' => 'IHC',
            'name' => 'IHC Register',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 5,
            'slug' => 'it-management',
            'name' => 'IT Management',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 6,
            'slug' => 'cloud-readiness',
            'name' => 'Cloud Readiness',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 7,
            'slug' => 'bia',
            'name' => 'BIA',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 8,
            'slug' => 'risk',
            'name' => 'Risk',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 9,
            'slug' => 'bcp',
            'name' => 'BCP',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 10,
            'slug' => 'facility-risk',
            'name' => 'Facility Risk',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 11,
            'slug' => 'cloud-vendor-risk',
            'name' => 'Cloud Vendor Risk',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 12,
            'slug' => 'cloud-maturity',
            'name' => 'Cloud Matuirty',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 13,
            'slug' => 'cybersecurity-maturity',
            'name' => 'Cybersecurity Maturity',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 14,
            'slug' => 'drm',
            'name' => 'DRM',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 15,
            'slug' => 'drm-register',
            'name' => 'DRM Register',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 16,
            'slug' => 'document-library',
            'name' => 'Docuement Library',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 17,
            'slug' => 'dmm',
            'name' => 'DMM',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 18,
            'slug' => 'dmm-register',
            'name' => 'DMM Register',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


        DB::table('assessment_types')->insert([
            'id' => 19,
            'slug' => 'itcl-mta',
            'name' => 'ITCL MTA',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 20,
            'slug' => 'csa',
            'name' => 'CSA',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);
        
        DB::table('assessment_types')->insert([
            'id' => 21,
            'slug' => 'sfia',
            'name' => 'SFIA',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 22,
            'slug' => 'sfia-register',
            'name' => 'SFIA Register',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);

        DB::table('assessment_types')->insert([
            'id' => 23,
            'slug' => 'technical-survey',
            'name' => 'Technical Survey',
            'description' => NULL,
            'image'=> NULL,
            'status'=> true,
            'created_by' => Auth::id() 

        ]);


    }
}
