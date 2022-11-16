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
        Role::create(['name' => 'Super Admin']);

        $adminRole = Role::create(['name' => 'Admin']);
        $financeRole = Role::create(['name' => 'Finance']);
        $partnerRole = Role::create(['name' => 'Mitra']);
        $candidateRole = Role::create(['name' => 'Kandidat']);
        $userRole = Role::create(['name' => 'Member']);

        $calonKandidatRole = Role::create(['name' => 'Calon Kandidat']);
        $calonMitraRole = Role::create(['name' => 'Calon Mitra']);

        // Control Panel
        Permission::create(['name' => 'access-admincp']);
        Permission::create(['name' => 'access-financecp']);
        Permission::create(['name' => 'access-mitracp']);
        Permission::create(['name' => 'access-kandidatcp']);
        Permission::create(['name' => 'access-usercp']);

        // Manage Article
        Permission::create(['name' => 'manage-article']);
        Permission::create(['name' => 'create-article']);
        Permission::create(['name' => 'edit-article']);
        Permission::create(['name' => 'delete-article']);

        // Manage Job Vacancy
        Permission::create(['name' => 'manage-job-vacancy']);
        Permission::create(['name' => 'create-job-vacancy']);
        Permission::create(['name' => 'edit-job-vacancy']);
        Permission::create(['name' => 'delete-job-vacancy']);
        Permission::create(['name' => 'register-job']);

        // Manage Candidate
        Permission::create(['name' => 'manage-kandidat']);
        Permission::create(['name' => 'create-kandidat']);
        Permission::create(['name' => 'edit-kandidat']);
        Permission::create(['name' => 'delete-kandidat']);

        // Manage User
        Permission::create(['name' => 'manage-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'manage-user-role']);
        Permission::create(['name' => 'give-user-role']);
        Permission::create(['name' => 'revoke-user-role']);
        Permission::create(['name' => 'give-user-permission']);
        Permission::create(['name' => 'revoke-user-permission']);

        // Manage Role & Permission
        Permission::create(['name' => 'manage-role']);
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'delete-role']);
        Permission::create(['name' => 'sync-role-permission']);

        // Finance
        Permission::create(['name' => 'manage-wallet']);
        Permission::create(['name' => 'access-wallet']);
        Permission::create(['name' => 'create-wallet']);
        Permission::create(['name' => 'edit-wallet']);
        Permission::create(['name' => 'delete-wallet']);
        Permission::create(['name' => 'manage-income']);
        Permission::create(['name' => 'access-income']);
        Permission::create(['name' => 'create-income']);
        Permission::create(['name' => 'edit-income']);
        Permission::create(['name' => 'delete-income']);
        Permission::create(['name' => 'manage-expense']);
        Permission::create(['name' => 'access-expense']);
        Permission::create(['name' => 'create-expense']);
        Permission::create(['name' => 'edit-expense']);
        Permission::create(['name' => 'delete-expense']);
        Permission::create(['name' => 'export-report']);

        $calonKandidatRole->givePermissionTo([
            'access-usercp',
        ]);

        $calonMitraRole->givePermissionTo([
            'access-usercp',
        ]);

        $userRole->givePermissionTo([
            'access-usercp',
        ]);

        $candidateRole->givePermissionTo([
            'access-usercp',
            'access-kandidatcp',
            'register-job',
        ]);

        $partnerRole->givePermissionTo([
            'access-usercp',
            'access-mitracp',
            'manage-job-vacancy',
            'create-job-vacancy',
            'edit-job-vacancy',
            'delete-job-vacancy',
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
            'sync-role-permission'
        ]);

        User::find(1)->syncRoles('Super Admin');
        User::find(2)->syncRoles('Admin');
        User::find(3)->syncRoles('Finance');
        User::find(4)->syncRoles('Mitra');
        User::find(5)->syncRoles('Kandidat');
        User::find(6)->syncRoles('Member');

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
