<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Added
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin Test',
                'email' => 'superadmin@superadmin.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-superadmin'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Admin Test',
                'email' => 'admin@admin.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-admin'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Finance Test',
                'email' => 'finance@finance.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-finance'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Mitra Test',
                'email' => 'mitra@mitra.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-mitra'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Kandidat Test',
                'email' => 'kandidat@kandidat.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-kandidat'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Member Test',
                'email' => 'member@member.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-member'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Need Verification',
                'email' => 'need@verification.test',
                'email_verified_at' => null,
                'password' => Hash::make('test-verification'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Kandidat 2',
                'email' => 'kandidat2@kandidat.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-kandidat'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Kandidat 3',
                'email' => 'kandidat3@kandidat.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-kandidat'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
            [
                'name' => 'Kandidat 4',
                'email' => 'kandidat4@kandidat.test',
                'email_verified_at' => now(),
                'password' => Hash::make('test-kandidat'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ],
        ];
        User::insert($data);
    }
}
