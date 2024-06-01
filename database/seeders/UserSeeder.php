<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $userData = [

            [
                'nama'=>'admin',
                'password'=>Hash::make('admin123'),
                'role'=>'admin'
            ],
        ];

        foreach($userData as $key=> $val){
            User::create($val);
        }
    }
}

