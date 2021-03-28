<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'talent_create',
            ],
            [
                'id'    => 18,
                'title' => 'talent_edit',
            ],
            [
                'id'    => 19,
                'title' => 'talent_show',
            ],
            [
                'id'    => 20,
                'title' => 'talent_delete',
            ],
            [
                'id'    => 21,
                'title' => 'talent_access',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'guide_create',
            ],
            [
                'id'    => 25,
                'title' => 'guide_edit',
            ],
            [
                'id'    => 26,
                'title' => 'guide_show',
            ],
            [
                'id'    => 27,
                'title' => 'guide_delete',
            ],
            [
                'id'    => 28,
                'title' => 'guide_access',
            ],
            [
                'id'    => 29,
                'title' => 'conversation_create',
            ],
            [
                'id'    => 30,
                'title' => 'conversation_edit',
            ],
            [
                'id'    => 31,
                'title' => 'conversation_show',
            ],
            [
                'id'    => 32,
                'title' => 'conversation_delete',
            ],
            [
                'id'    => 33,
                'title' => 'conversation_access',
            ],
            [
                'id'    => 34,
                'title' => 'talent_talk_time_create',
            ],
            [
                'id'    => 35,
                'title' => 'talent_talk_time_edit',
            ],
            [
                'id'    => 36,
                'title' => 'talent_talk_time_show',
            ],
            [
                'id'    => 37,
                'title' => 'talent_talk_time_delete',
            ],
            [
                'id'    => 38,
                'title' => 'talent_talk_time_access',
            ],
            [
                'id'    => 39,
                'title' => 'guide_talk_time_create',
            ],
            [
                'id'    => 40,
                'title' => 'guide_talk_time_edit',
            ],
            [
                'id'    => 41,
                'title' => 'guide_talk_time_show',
            ],
            [
                'id'    => 42,
                'title' => 'guide_talk_time_delete',
            ],
            [
                'id'    => 43,
                'title' => 'guide_talk_time_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
