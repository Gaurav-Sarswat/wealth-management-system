<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\RelationshipManager;

class RelationshipManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('secret')],
            // ['name' => 'Jane Doe', 'email' => 'jane@example.com', 'password' => bcrypt('secret')],
        ];

        foreach ($users as $user) {
            RelationshipManager::create($user);
        }
    }
}
