<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $users = User::all()->except(1);
        return view('admin.pages.users.test',compact('title','users'));
        
    }
    public function add_user_view()
    {
        $title = 'Users';
        $roles = Role::all()->except(1);
        return view('admin.pages.users.add',compact('title','roles'));
        
    }
    public function create_user(Request $request)
    {
        // $data = $request->all();
        // echo "<pre>"; print_r($data); exit();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
            'designation' => 'required|min:2',
            'role' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'cnic' => 'required',
            'bank_account' => 'required',
            'joining_date' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->has('file')) {
            $imageName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('images'), $imageName);
        }
        // echo "<pre>"; print_r($imageName); exit();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'designation' => $request->designation,
            'image' => $imageName,
            'phone' => $request->phone,
            'address' => $request->address,
            'cnic' => $request->cnic,
            'bank_account' => $request->bank_account,
            'joining_date' => $request->joining_date,
        ]);
        $user->code = "00".$user->id;
        $user->save();
        $user->attachRole($request->role);
        return redirect()->route('/admin/users')->with('success','User created successfully.');
    }
    public function edit_user_view($id)
    {
        $title = 'Edit User';
        $employee = User::where('id', $id)->first();
        $emp_role = $employee->roles[0]->name;
        $roles = Role::all()->except(1);
        return view('admin.pages.users.edit',compact('title','roles','employee','emp_role'));
    }
    public function update_user(Request $request)
    {
        $data = $request->all();
        echo "<pre>"; print_r($data); exit('poikk');
    }
}
