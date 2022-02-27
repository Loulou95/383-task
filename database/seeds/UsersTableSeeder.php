<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'email' => 'admin@yahoo.co.uk',
                'name' => 'Admin',
                'location' => 'Manchester',
                'is_admin' => true,
                'password' => Hash::make('password12'),
            ],
            [
                'id' => 5,
                'email' => 'user@yahoo.co.uk',
                'name' => 'User1',
                'location' => 'Birmingham',
                'is_admin' => false,
                'password' => Hash::make('password12'),
            ],
        ];

        foreach($users as $user) {
            \App\User::updateOrCreate(
                [
                    'id'=>$user['id']
                ],
                $user
            );
        }
    }
}
