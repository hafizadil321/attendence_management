<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
use App\Models\Attendance;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use File;

class EmployeeController extends Controller
{
    public function employees()
    {
        $title = 'Employee';
        $employees = Employee::all();
        return view('admin.pages.employee.test',compact('title','employees'));
        
    }

    public function add_employee_view()
    {
        $title = 'Employee';
        $roles = Role::all()->except(1);
        // echo "<pre>"; print_r($roles); exit();
        return view('admin.pages.employee.add',compact('title','roles'));
    }
    // public function add_employee(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:2|max:255',
    //         'email' => 'required|email|unique:employees',
    //         'position' => 'required|min:2',
    //     ]);

    //     if ($validator->fails()) { 
    //         $data = array(
    //             'success' => false,
    //             'errors' => $validator->errors()->first()
    //         );
    //         return $data;
    //     }
    //     $user = Employee::create([
    //         'name' => $request->name,
    //         'position' => $request->position,
    //         'email' => $request->email,
    //     ]);
    //     $user->code = "00".$user->id;
    //     $user->save();
    //     $data = array(
    //         'success' => true,
    //         'data' => $user,
    //     );
    //     return $data;
    // }
    public function add_employee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
            'designation' => 'required|min:2',
            'role' => 'required',
            'file' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'designation' => $request->designation,
        ]);
        $user->code = "00".$user->id;
        $user->save();
        return redirect()->route('products.index')->with('success','User created successfully.');
    }
    public function get_employee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) { 
            $data = array(
                'success' => false,
                'errors' => $validator->errors()->first()
            );
            return $data;
        }
        $employee = Employee::where('id', $request->id)->first();

        $data = array(
            'success' => true,
            'data' => $employee,
        );
        return $data;
    }
    public function update_employee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'email' => 'required',
            'position' => 'required|min:2',
        ]);

        if ($validator->fails()) { 
            $data = array(
                'success' => false,
                'errors' => $validator->errors()->first()
            );
            return $data;
        }
        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->save();
        $data = array(
            'success' => true,
            'data' => $employee,
        );
        return $data;
    }
    public function delete_employee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) { 
            $data = array(
                'success' => false,
                'errors' => $validator->errors()->first()
            );
            return $data;
        }
        $employee = Employee::find($request->id);
        $employee->delete();
        $data = array(
            'success' => true,
            'data' => $employee,
        );
        return $data;
    }
    public function test()
    {
        $title = 'TEST';
        return view('admin.pages.employee.test',compact('title'));
    }


    public function attendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if ($validator->fails()) { 
            $data = array(
                'success' => false,
                'errors' => $validator->errors()->first()
            );
            return $data;
        }
        $employee = Employee::where('code', $request->code)->first();
        if ($employee) {
            $attendance = Attendance::where('emp_id', $employee->id)->whereDate('created_at', Carbon::today())->first();
            if ($attendance) {
                if($attendance->check_out == null) {
                    $attendance->check_out = Carbon::now();
                    $attendance->save();
                    $data = array(
                        'success' => true,
                        'data' => $employee,
                    );
                    return $data;
                }else{
                    $data = array(
                        'success' => false,
                        'errors' => "Your have already marked attendance.",
                    );
                    return $data;
                }
            }else{
                $attendance = Attendance::create([
                    'emp_id' => $employee->id,
                    'check_in' => Carbon::now(),
                ]);
                $data = array(
                    'success' => true,
                    'data' => $employee,
                );
                return $data;
            }
        }else{
            $data = array(
                'success' => false,
                'errors' => "No Employee Found."
            );
            return $data;
        }
    }
    public function employee_attendance($id)
    {
        $title = 'Employee';
        $attendance = Attendance::with('employee')->where('emp_id', $id)->get();
        // dd($attendance);
        return view('admin.pages.employee.attendance',compact('title','attendance'));
    }
}
