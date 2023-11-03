<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        if (!Permission::where('name', 'create post')->exists()) {
            Permission::create(['name' => 'create post']);
        }
        if (!Permission::where('name', 'edit post')->exists()) {
            Permission::create(['name' => 'edit post']);
        }
        if (!Permission::where('name', 'delete post')->exists()) {
            Permission::create(['name' => 'delete post']);
        }

        // Create roles and assign permissions
        $superAdminRole = Role::create(['name' => 'superadmin']);
        $superAdminRole->givePermissionTo('create post');
        $superAdminRole->givePermissionTo('edit post');
        $superAdminRole->givePermissionTo('delete post');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('create post');
        $adminRole->givePermissionTo('edit post');
        $adminRole->givePermissionTo('delete post');

        $kecamatanRole = Role::create(['name' => 'kecamatan']);
        $kecamatanRole->givePermissionTo('create post');

        $kelurahanRole = Role::create(['name' => 'kelurahan']);
        $kelurahanRole->givePermissionTo('create post');

        $lkkRole = Role::create(['name' => 'lkk']);

        // Create users and assign roles
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin123')
        ]);
        $superAdmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('admin');

        $kecamatan = User::create([
            'name' => 'Kecamatan',
            'email' => 'kecamatan@example.com',
            'password' => Hash::make('kecamatan123')
        ]);
        $kecamatan->assignRole('kecamatan');

        $kelurahan = User::create([
            'name' => 'Kelurahan',
            'email' => 'kelurahan@example.com',
            'password' => Hash::make('kelurahan123')
        ]);
        $kelurahan->assignRole('kelurahan');

        $lkk = User::create([
            'name' => 'LKK',
            'email' => 'lkk@example.com',
            'password' => Hash::make('lkk123')
        ]);
        $lkk->assignRole('lkk');
    }
}
