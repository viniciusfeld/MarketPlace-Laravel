<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \DB::table('users')->insert(
       //     [
       //     'name' => 'Administrator',
       //     'email' => 'admin@admin.com',
       //     'email_verified_at' => now(),
       //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
       //     'remember_token' => 'qwer',
       // 
       //     ]
       //     
       //     );

       $user = User::factory()
            ->count(40)
            ->create();

    }
}
