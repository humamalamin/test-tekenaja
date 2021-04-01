<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $tables = [
            'roles',
//            'permissions',
            'model_has_roles',
//            'model_has_permissions'
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

//        $timestamp = ['created_at' => now(), 'updated_at' => now()];

//        Permission::insert([
//            array_merge(['group' => 'dashboard', 'name' => 'dashboard read'], $timestamp),
//            array_merge(['group' => 'author', 'name' => 'author read'], $timestamp),
//            array_merge(['group' => 'author', 'name' => 'author create'], $timestamp),
//            array_merge(['group' => 'author', 'name' => 'author delete'], $timestamp),
//            array_merge(['group' => 'author', 'name' => 'author update'], $timestamp),
//            array_merge(['group' => 'author', 'name' => 'author show'], $timestamp),
//            array_merge(['group' => 'permission', 'name' => 'permission create'], $timestamp),
//            array_merge(['group' => 'permission', 'name' => 'permission read'], $timestamp),
//            array_merge(['group' => 'permission', 'name' => 'permission update'], $timestamp),
//            array_merge(['group' => 'permission', 'name' => 'permission delete'], $timestamp),
//            array_merge(['group' => 'role', 'name' => 'role create'], $timestamp),
//            array_merge(['group' => 'role', 'name' => 'role read'], $timestamp),
//            array_merge(['group' => 'role', 'name' => 'role update'], $timestamp),
//            array_merge(['group' => 'role', 'name' => 'role delete'], $timestamp),
//            array_merge(['group' => 'user', 'name' => 'user create'], $timestamp),
//            array_merge(['group' => 'user', 'name' => 'user read'], $timestamp),
//            array_merge(['group' => 'user', 'name' => 'user update'], $timestamp),
//            array_merge(['group' => 'user', 'name' => 'user delete'], $timestamp),
//            array_merge(['group' => 'book', 'name' => 'book read'], $timestamp),
//            array_merge(['group' => 'book', 'name' => 'book create'], $timestamp),
//            array_merge(['group' => 'book', 'name' => 'book update'], $timestamp),
//            array_merge(['group' => 'book', 'name' => 'book show'], $timestamp),
//        ]);

        Role::create([
            'name' => 'super administrator'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        Model::reguard();
    }
}
