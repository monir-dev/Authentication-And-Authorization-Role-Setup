<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_visitor = Role::where('name', 'Visitro')->first();
      $role_admin = Role::where('name', 'Admin')->first();
      $role_author = Role::where('name', 'Author')->first();

      $user = new User();
      $user->name = 'Visitor';
      $user->email = 'visitor@gmail.com';
      $user->password = bcrypt('visitor123');
      $user->save();
      $user->roles()->attach($role_visitor);

      $user = new User();
      $user->name = 'Admin';
      $user->email = 'admin@gmail.com';
      $user->password = bcrypt('admin123');
      $user->save();
      $user->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Author';
      $user->email = 'author@gmail.com';
      $user->password = bcrypt('author123');
      $user->save();
      $user->roles()->attach($role_author);
    }
}
