<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('home')->withUsers($users);
    }

    public function adminIndex()
    {
      $users = User::all();
      return view('admin')->withUsers($users);
    }

    public function authorIndex()
    {

        $role_id = DB::table('user_role')
                ->join('users', 'user_role.user_id', '=', 'users.id')
                ->join('roles','user_role.role_id','=','roles.id')
                ->where('user_role.user_id', Auth::user()->id)
                ->select('roles.id')
                ->first();

      if ($role_id->id==3) {
        $users = User::all();
        return view('author')->withUsers($users);
      }
      return redirect()->back();


    }

    public function visitorIndex()
    {
      $users = User::all();
      return view('visitor')->withUsers($users);
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_visitor']) {
            $user->roles()->attach(Role::where('role_name', 'Visitor')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('role_name', 'Admin')->first());
        }
        if ($request['role_author']) {
            $user->roles()->attach(Role::where('role_name', 'Author')->first());
        }
        return redirect()->back();
    }
}
