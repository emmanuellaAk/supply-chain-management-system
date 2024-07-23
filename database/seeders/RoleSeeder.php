<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they do not exist
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $roleManager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $roleCustomer = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'customer']);

        // Create a super-admin user if it does not exist
        $user = User::firstOrCreate([
            'email' => 'antwonomar@icloud.com',
        ], [
            'name' => 'Antwon Omar',
            'password' => Hash::make('emma1234'),
            'mobile_number' => '0502749808',
        ]);

        // Assign super-admin role to the user
        $user->assignRole('super-admin');

        // Define permissions with the web guard
        $permissions = [
            'login',
            'admin.login',
            'dashboard',
            'suppliers',
            'view.supplier',
            'add.supplier',
            'edit.supplier.getmethod',
            'edit.supplier',
            'delete-supplier',
            'all-purchases',
            'purchase-order',
            'addPurchaseOrder',
            'received',
            'receive',
            'declined',
            'filter',
            'inventory',
            'inventory-form',
            'inventory-create',
            'add.product',
            'edit',
            'edit-product',
            'delete',
        ];

        // Create permissions if they do not exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Give all permissions to super-admin role
        $roleSuperAdmin->givePermissionTo(Permission::where('guard_name', 'web')->get());

        // Define customer-specific permissions with the customer guard
        $customerPermissions = [
            'customer-dashboard',
            // Add other permissions specific to customers here
        ];

        // Create customer-specific permissions and assign them to the customer role
        foreach ($customerPermissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'customer']);
            $roleCustomer->givePermissionTo($permission);
        }
    }
}
