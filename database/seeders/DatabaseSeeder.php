<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([RoleSeeder::class]);
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin ',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role_id'=> Role::where('name', 'admin')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'test user',
            'email' => 'test@example.com',
            'password' => bcrypt('customer123'),
            'role_id'=> Role::where('name', 'customer')->first()->id,
        ]);
        
    }
}
