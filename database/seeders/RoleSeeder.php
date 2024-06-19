<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role = Role::create(['name'=> 'super-admin']);
        $role = Role::create(['name'=> 'manager']);
        $role = Role::create(['name'=> 'customer']);
        
        $user = User::create([
            'name' => 'Antwon Omar',
            'email' => 'antwonomar@icloud.com',
            'company'=> 'Ants',
            'password'=> Hash::make('antwonzy'),
            'mobile_number'=> '0502749808'
        ]);

        $user->assignRole('super-admin');

        Permission::firstOrCreate(['name' => 'dashboard']);
        Permission::firstOrCreate(['name' => 'suppliers']);
        Permission::firstOrCreate(['name' => 'view.supplier']);
        Permission::firstOrCreate(['name' => 'add.supplier']);
        Permission::firstOrCreate(['name' => 'edit.supplier.getmethod']);
        Permission::firstOrCreate(['name' => 'edit.supplier']);
        Permission::firstOrCreate(['name' => 'delete-supplier']);

        Permission::firstOrCreate(['name' => 'all-purchases']);
        Permission::firstOrCreate(['name' => 'purchase-order']);
        Permission::firstOrCreate(['name' => 'addPurchaseOrder']);
        Permission::firstOrCreate(['name' => 'received']);
        Permission::firstOrCreate(['name' => 'receive']);
        Permission::firstOrCreate(['name' => 'declined']);
        Permission::firstOrCreate(['name' => 'filter']);
        Permission::firstOrCreate(['name' => 'inventory']);
        Permission::firstOrCreate(['name' => 'inventory-form']);
        Permission::firstOrCreate(['name' => 'inventory-create']);
        Permission::firstOrCreate(['name' => 'add.product']);
        Permission::firstOrCreate(['name' => 'edit']);
        Permission::firstOrCreate(['name' => 'edit-product']);
        Permission::firstOrCreate(['name' => 'delete']);






        $role = Role::where('name' , 'super-admin')->first();
        $role->givePermissionTo(Permission::all());

    }
}
