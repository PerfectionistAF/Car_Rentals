<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //test users table//check User model
        //for loop to get many values
        /*for($i=0; $i<5; $i++){
            
            User::create([
                'name'=>'User'.$i ,
                'email'=>'user1@example.com' . $i,
                'password'=>'12345_'.$i
            ]);

        }*/
        User::factory()->count(3)->hasPosts(3)->create();//1:m 

        User::factory()->has(Role::factory()->count(3))->create();//m:m relationship

    }
}
