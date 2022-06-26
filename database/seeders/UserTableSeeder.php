<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords=[[
            'id'=>'1','name'=>'Samwel','email'=>'admin@admin.com','password'=>'$2a$12$hQnQfkAPWVgfM1.StCDLKu.r7yw1kSGo17u2QjytmeQQ9gHF96iPe',
            'lname'=>'Masika','phone'=>'0714439960','address1'=>'234','address2'=>'456',
            'city'=>'Dodoma','state'=>'Central Zone','country'=>'Tanzania','pincode'=>'235',
            'role_as'=>'1','remember_token'=>'',
        ]];

        User::insert($adminRecords);
        
    }
}
