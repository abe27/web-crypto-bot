<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Administrator;
use App\Models\AntiSpamCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed User
        $user = new User();
        $user->name = 'Crypto Bot';
        $user->email = 'krumii.it@gmail.com';
        $user->password = Hash::make('P@rz1v@l');
        $user->is_verified = true;
        $user->save();

        // Seed Admin
        $admin = new Administrator();
        $admin->user_id = $user->id;
        $admin->is_active = true;
        $admin->save();

        $ant = new AntiSpamCode();
        $ant->user_id = $user->id;
        $ant->anti_spam_code = 'ADMIN-25302705';
        $ant->is_active = true;
        $ant->save();

        /* seed user */
        $user = new User();
        $user->name = 'Taweechai Yuenyang';
        $user->email = 'kanomthaios@hotmail.com';
        $user->password = Hash::make('1q2w3e4r5t6y');
        $user->is_verified = true;
        $user->save();

        $ant = new AntiSpamCode();
        $ant->user_id = $user->id;
        $ant->anti_spam_code = 'TAWEECHAI-25302705';
        $ant->is_active = true;
        $ant->save();
    }
}
