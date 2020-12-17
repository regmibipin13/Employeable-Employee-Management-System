<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'permission_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '6',
                'title'      => 'role_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '7',
                'title'      => 'role_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '8',
                'title'      => 'role_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '9',
                'title'      => 'role_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '10',
                'title'      => 'role_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '11',
                'title'      => 'user_management_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '17',
                'title'      => 'designation_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '18',
                'title'      => 'designation_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '19',
                'title'      => 'designation_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '20',
                'title'      => 'designation_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '21',
                'title'      => 'designation_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '22',
                'title'      => 'department_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '23',
                'title'      => 'department_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '24',
                'title'      => 'department_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '25',
                'title'      => 'department_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '26',
                'title'      => 'department_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '27',
                'title'      => 'employee_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '28',
                'title'      => 'employee_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '29',
                'title'      => 'employee_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '30',
                'title'      => 'employee_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '31',
                'title'      => 'employee_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '32',
                'title'      => 'attendance_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '33',
                'title'      => 'attendance_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '34',
                'title'      => 'attendance_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '35',
                'title'      => 'attendance_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '36',
                'title'      => 'attendance_start',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '37',
                'title'      => 'attendance_end',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '38',
                'title'      => 'leave_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '39',
                'title'      => 'leave_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '40',
                'title'      => 'leave_edit',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '41',
                'title'      => 'leave_approve',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '42',
                'title'      => 'leave_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '43',
                'title'      => 'salary_dues_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '44',
                'title'      => 'salary_dues_show',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '45',
                'title'      => 'salary_dues_pay',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '46',
                'title'      => 'transactions_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '47',
                'title'      => 'transactions_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '48',
                'title'      => 'salary_management_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '49',
                'title'      => 'holidays_access',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '50',
                'title'      => 'holidays_create',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
            [
                'id'         => '51',
                'title'      => 'holidays_delete',
                'created_at' => '2019-09-28 14:22:15',
                'updated_at' => '2019-09-28 14:22:15',
            ],
        ];

        Permission::insert($permissions);

    }
}
