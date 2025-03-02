<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'dashboard_password_edit',
                'label' => __('panel.permission.items.dashboard_password_edit'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 2,
                'title' => 'user_access',
                'label' => __('panel.permission.items.user_access'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 3,
                'title' => 'user_show',
                'label' => __('panel.permission.items.user_show'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 4,
                'title' => 'user_create',
                'label' => __('panel.permission.items.user_create'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 5,
                'title' => 'user_edit',
                'label' => __('panel.permission.items.user_edit'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 6,
                'title' => 'user_delete',
                'label' => __('panel.permission.items.user_delete'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 7,
                'title' => 'role_access',
                'label' => __('panel.permission.items.role_access'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 8,
                'title' => 'role_show',
                'label' => __('panel.permission.items.role_show'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 9,
                'title' => 'role_create',
                'label' => __('panel.permission.items.role_create'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 10,
                'title' => 'role_edit',
                'label' => __('panel.permission.items.role_edit'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
                'label' => __('panel.permission.items.role_delete'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            /*[
                'id'    => 12,
                'title' => 'permission_access',
                'label' => __('panel.permission.items.permission_access'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 13,
                'title' => 'permission_show',
                'label' => __('panel.permission.items.permission_show'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 14,
                'title' => 'permission_create',
                'label' => __('panel.permission.items.permission_create'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 15,
                'title' => 'permission_edit',
                'label' => __('panel.permission.items.permission_edit'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id'    => 16,
                'title' => 'permission_delete',
                'label' => __('panel.permission.items.permission_delete'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],*/
        ];
        Permission::insert($permissions);
    }
}
