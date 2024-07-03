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
        // Create roles
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleManager = Role::create(['name' => 'manager']);
        $roleCustomer = Role::create(['name' => 'customer', 'guard_name' => 'customer']);

        // Create a super-admin user
        $user = User::create([
            'name' => 'Antwon Omar',
            'email' => 'antwonomar@icloud.com',
            'password' => Hash::make('emma1234'),
            'mobile_number' => '0502749808',
        ]);

        // Assign super-admin role to the user
        $user->assignRole('super-admin');

        // Define permissions
        $permissions = [
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
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Give all permissions to super-admin role
        $roleSuperAdmin->givePermissionTo(Permission::all());

        // Define customer-specific permissions
        $customerPermissions = [
            'customer-dashboard',
            // Add other permissions specific to customers here
        ];

        // Assign customer-specific permissions to the customer role
        foreach ($customerPermissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $roleCustomer->givePermissionTo($permission);
        }
    }
}
