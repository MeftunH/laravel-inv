<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        auth()->user()->givePermissionTo('create');
//        auth()->user()->givePermissionTo('edit');
//        auth()->user()->givePermissionTo('delete');
//        auth()->user()->assignRole('manager');
//        Role::create(['name'=>'admin']);
//        Role::create(['name'=>'manager']);
//        $permission=Permission::create(['name'=>'create']);
//        $permission=Permission::create(['name'=>'edit']);
//        $permission=Permission::create(['name'=>'delete']);
//        $permission=Permission::create(['name'=>'show']);
//       $role=Role::findById(3);
//        $permission=Permission::findById(4);
//        $role->givePermissionTo($permission);
//$permission=Permission::findById(3);
//$role=Role::findById(2);
//        $role->revokePermissionTo($permission);
//$role=auth()->user()->getAllPermissions();
        //auth()->user()->givePermissionTo('edit_product');

//         $role->givePermissionTo('create');
//         $role->givePermissionTo('edit');
//         $role->givePermissionTo('delete');
//        $role->givePermissionTo('show');
        return view('home');

    }
}
