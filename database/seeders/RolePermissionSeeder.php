<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Added
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // All Default Roles
        Role::create(['name' => 'Super Admin']);                            // ID = 1
        $adminRole = Role::create(['name' => 'Admin']);                     // ID = 2
        $financeRole = Role::create(['name' => 'Finance']);                 // ID = 3
        $partnerRole = Role::create(['name' => 'Mitra']);                   // ID = 4
        $candidateRole = Role::create(['name' => 'Kandidat']);              // ID = 5
        $userRole = Role::create(['name' => 'Member']);                     // ID = 6
        $calonKandidatRole = Role::create(['name' => 'Calon Kandidat']);    // ID = 7
        $calonMitraRole = Role::create(['name' => 'Calon Mitra']);          // ID = 8

        $permissions = [
            // Control Panel
            'access-admincp',
            'access-financecp',
            'access-mitracp',
            'access-kandidatcp',
            'access-usercp',
            // Coin Logs
            'manage-coin-log',
            'view-coin-log',
            'delete-coin-log',
            'restore-coin-log',
            'forceDelete-coin-log',
            // Top Up Coins
            'top-up-coin',
            'view-own-invoice',
            'transaction-top-up-coin',
            // Manage Article
            'manage-article',
            'create-article',
            'edit-article',
            'delete-article',
            // Manage Job Vacancy
            'manage-job-vacancy',
            'create-job-vacancy',
            'edit-job-vacancy',
            'delete-job-vacancy',
            // Manage Calon Kandidat
            'accept-pre-candidate',
            'reject-pre-candidate',
            // Manage Calon Mitra
            'accept-pre-partner',
            'reject-pre-partner',
            // Manage Partner
            'manage-partner',
            'create-partner',
            'edit-partner',
            'delete-partner',
            // Manage Candidate
            'manage-candidate',
            'create-candidate',
            'edit-candidate',
            'delete-candidate',
            // Manage Skills
            'manage-skill',
            'create-skill',
            'edit-skill',
            'delete-skill',
            // Manage Job Candidate (Mitra)
            'manage-job-candidate',
            'submit-job-candidate',
            'accept-job-candidate',
            'reject-job-candidate',
            'remove-job-candidate',
            'view-job-candidate',
            'unlock-job-candidate',
            // Manage User
            'manage-user',
            'create-user',
            'edit-user',
            'delete-user',
            'manage-user-role',
            'give-user-role',
            'revoke-user-role',
            'give-user-permission',
            'revoke-user-permission',
            // Manage Role & Permission
            'manage-role',
            'create-role',
            'edit-role',
            'delete-role',
            'sync-role-permission',
            // Finance
            'manage-wallet',
            'access-wallet',
            'create-wallet',
            'edit-wallet',
            'delete-wallet',
            'manage-income',
            'access-income',
            'create-income',
            'edit-income',
            'delete-income',
            'manage-expense',
            'access-expense',
            'create-expense',
            'edit-expense',
            'delete-expense',
            'export-report',
            // Kandidat
            'manage-my-job',
            'accept-job-from-mitra',
            'reject-job-from-mitra',
            'register-job-for-me',
            // Member
            'daftar-kandidat',
            'daftar-mitra',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $calonKandidatRole->givePermissionTo([
            'access-usercp',
            'daftar-kandidat',
        ]);

        $calonMitraRole->givePermissionTo([
            'access-usercp',
            'daftar-mitra',
        ]);

        $userRole->givePermissionTo([
            'access-usercp',
            'daftar-kandidat',
            'daftar-mitra',
        ]);

        $candidateRole->givePermissionTo([
            'access-usercp',
            'access-kandidatcp',
            'manage-my-job',
            'accept-job-from-mitra',
            'reject-job-from-mitra',
            'register-job-for-me',
        ]);

        $partnerRole->givePermissionTo([
            'access-usercp',
            'access-mitracp',
            'manage-job-vacancy',
            'create-job-vacancy',
            'edit-job-vacancy',
            'delete-job-vacancy',
            'manage-job-candidate',
            'submit-job-candidate',
            'accept-job-candidate',
            'reject-job-candidate',
            'remove-job-candidate',
            'view-job-candidate',
            'unlock-job-candidate',
            'top-up-coin',
            'view-own-invoice',
            'transaction-top-up-coin',
        ]);

        $financeRole->givePermissionTo([
            'access-usercp',
            'access-financecp',
            //Wallet
            'manage-wallet',
            'access-wallet',
            'create-wallet',
            'edit-wallet',
            'delete-wallet',
            // Income
            'manage-income',
            'access-income',
            'create-income',
            'edit-income',
            'delete-income',
            // Expense
            'manage-expense',
            'access-expense',
            'create-expense',
            'edit-expense',
            'delete-expense',
            'export-report',
        ]);

        $adminRole->givePermissionTo([
            // Control Panel
            'access-usercp',
            'access-admincp',
            // Article
            'manage-article',
            'create-article',
            'edit-article',
            'delete-article',
            // User
            'manage-user',
            'create-user',
            'edit-user',
            'delete-user',
            // User Role & Permissions
            'manage-user-role',
            'give-user-role',
            'revoke-user-role',
            'give-user-permission',
            'revoke-user-permission',
            // Role & Permission
            'manage-role',
            'create-role',
            'edit-role',
            'delete-role',
            'sync-role-permission',
            //Coin Logs
            'manage-coin-log',
            'view-coin-log',
            'delete-coin-log',
            'restore-coin-log',
            'forceDelete-coin-log',
        ]);

        User::find(1)->syncRoles('Super Admin');
        User::find(2)->syncRoles('Admin');
        User::find(3)->syncRoles('Finance');
        User::find(4)->syncRoles('Mitra');
        User::find(5)->syncRoles('Kandidat');
        User::find(6)->syncRoles('Member');
        User::find(8)->syncRoles('Kandidat');
        User::find(9)->syncRoles('Kandidat');
        User::find(10)->syncRoles('Kandidat');
        User::find(11)->syncRoles('Mitra');

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
