<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        DB::table('users')->delete();
        DB::table('role_user')->truncate();

        $adminRole       = Role::where('name','admin')->first();
        $operatorRole    = Role::where('name','operator')->first();
        $verifikatorRole = Role::where('name','verifikator')->first();
        $kadisRole       = Role::where('name','kadis')->first();

        $admin = User::create([
            'name'  => 'Admin',
            'email' => 'admin@disperkim.banjar',
            'password' => Hash::make('perkim@banjar')
        ]);

        $operator = User::create([
            'name'  => 'Operator',
            'email' => 'operator@disperkim.banjar',
            'password' => Hash::make('perkim@banjar')
        ]);

        $kadis = User::create([
            'name'  => 'Kadis',
            'email' => 'kadis@disperkim.banjar',
            'password' => Hash::make('perkim@banjar')
        ]);

        $verifikator = User::create([
            'name'  => 'Verifikator',
            'email' => 'verifikator@disperkim.banjar',
            'password' => Hash::make('perkim@banjar')
        ]);

        $admin->roles()->attach($adminRole);
        $operator->roles()->attach($operatorRole);
        $kadis->roles()->attach($kadisRole);
        $verifikator->roles()->attach($verifikatorRole);
    }
}
