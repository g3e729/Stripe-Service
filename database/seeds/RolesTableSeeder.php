<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
	protected $data = [
		'admin' => [
			'admin.home',
			'cashier.index',
			'cashier.show',
			'cashier.update',
			'cashier.destroy',
			'counter.index',
			'counter.show',
			'counter.update',
			'counter.destroy',
		],
		'accounting' => [
			'accounting.index',
			'cashier.index',
			'cashier.show',
			'cashier.update',
			'cashier.destroy',
			'counter.index',
			'counter.show',
			'counter.update',
			'counter.destroy',
		],
		'cashier' => [
			'cashier.index',
			'cashier.counter.index',
			'cashier.counter.show',
			'cashier.counter.update',
			'cashier.counter.destroy',
		]
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach ($this->data as $role => $role_permissions) {
			$role = Role::firstOrCreate(['name' => $role]);
			$permissions = collect([]);

			foreach ($role_permissions as $permission) {
				$permissions->push(Permission::firstOrCreate(['name' => $permission]));
			}

			$role->syncPermissions($permissions);
    	}
    }
}
