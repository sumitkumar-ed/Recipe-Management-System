<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $records= User::all();
        // foreach($data as $index=>$data);$records = User::all();
        // $i =1;
        // return $data;
        foreach($records as $record) {
            if ($record['uuid']==null){
                $record->uuid = Str::uuid()->toString();
                $record->save();
                // die();
            }
            // $i++;
            // return "false";
          
        
        }

        // die();
    }
}
