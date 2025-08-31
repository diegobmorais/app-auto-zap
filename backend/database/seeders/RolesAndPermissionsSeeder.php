<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissões
        Permission::firstOrCreate(['name' => 'manage-users']);
        Permission::firstOrCreate(['name' => 'view-reports']);

        // Roles
        $admin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin->givePermissionTo(Permission::all());

        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'client']);

        // Empresa de teste
        $company = Company::firstOrCreate(['name' => 'Empresa Teste']);

        // Usuário admin
        $adminUser = User::firstOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('123456'),
            'company_id' => $company->id
        ]);

        $adminUser->assignRole('admin');
    }
}
