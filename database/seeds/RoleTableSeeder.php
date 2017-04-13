<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_visitor = new Role;
      $role_visitor->role_name = "Visitor";
      $role_visitor->description = "A normal User";
      $role_visitor->save();

      $role_admin = new Role;
      $role_admin->role_name = "Admin";
      $role_admin->description = "An Admin";
      $role_admin->save();

      $role_author = new Role;
      $role_author->role_name = "Author";
      $role_author->description = "An Author";
      $role_author->save();
    }
}
