<?php

namespace Database\Factories;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      Role::create(['name' => 'admin']);
      Role::create(['name' => '5678']);
      Role::create(['name' => '9090']);
      Role::create(['name' => '7878']);
    }
}
