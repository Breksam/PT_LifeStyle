<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionName = [
            'message create', 'message view', 'message edit', 'message delete',
            'settings create', 'settings view', 'settings edit', 'settings delete',
            'reports orders', 'reports exams', 'reports users', 'reports view',
            'users create', 'users view', 'users edit', 'users delete',
            'sliders create', 'sliders view', 'sliders edit', 'sliders delete',
            'categories create', 'categories view', 'categories edit', 'categories delete',
            'brands create', 'brands view', 'brands edit', 'brands delete',
            'posts create', 'posts view', 'posts edit', 'posts delete',
            'products create', 'products view', 'products edit', 'products delete',
            'carts create', 'carts view', 'carts edit', 'carts delete',
            'wishlist create', 'wishlist view', 'wishlist edit', 'wishlist delete',
            'orders create', 'orders view', 'orders edit', 'orders delete',
            'promos create', 'promos view', 'promos edit', 'promos delete',
            'returning create', 'returning view', 'returning edit', 'returning delete',
            'payment_method create', 'payment_method view', 'payment_method edit', 'payment_method delete',
            'blogs create', 'blogs view', 'blogs edit', 'blogs delete',
            'reviews create', 'reviews view', 'reviews edit', 'reviews delete',
            'shipping_fees create', 'shipping_fees view', 'shipping_fees edit', 'shipping_fees delete',
            'delivery_companies create', 'delivery_companies view', 'delivery_companies edit', 'delivery_companies delete',
        ];

        $permissions = collect($arrayOfPermissionName)->map(function($permission){
            return ['name' => $permission , 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $role = Role::create(['name' => 'super admin'])
            ->givePermissionTo($arrayOfPermissionName);
    }
}
