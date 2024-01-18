<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
//GLOBAL FUNCTION
 function randomRole(){
    $random = rand(0,2);
    if($random == 0){
        $name = "Web Developer";
    }
    else if($random == 1){
        $name = "UX Designer";
    }
    else{
        $name ="Juniour";
    }
    return $name;
}
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'role_name'=> randomRole(),
            'role_date'=>fake()->date
        ];
    }
}
