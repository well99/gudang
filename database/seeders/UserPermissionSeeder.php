<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'tambah user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'hapus user']);
        Permission::create(['name' => 'lihat user']);

        // Permission::create(['name' => 'tambah barang']);
        // Permission::create(['name' => 'edit barang']);
        // Permission::create(['name' => 'hapus barang']);
        // Permission::create(['name' => 'lihat barang']);

        // Permission::create(['name' => 'tambah jenis']);
        // Permission::create(['name' => 'edit jenis']);
        // Permission::create(['name' => 'hapus jenis']);
        // Permission::create(['name' => 'lihat jenis']);

        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'tamu']);

        $roleSuperAdmin = Role::findByName('super admin');
        $roleSuperAdmin->givePermissionTo('tambah user');
        $roleSuperAdmin->givePermissionTo('edit user');
        $roleSuperAdmin->givePermissionTo('hapus user');
        $roleSuperAdmin->givePermissionTo('lihat user');
    }
}
