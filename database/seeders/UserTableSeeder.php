<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@admin',
            'password'=>bcrypt('barry')

        ]);
        //$users=factory(User::class,5)->create();
        User::factory()->count(5)->create();
    }

}
