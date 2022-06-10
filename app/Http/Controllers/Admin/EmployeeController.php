<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function employees()
    {
        $title = 'Employee';
        $employees = Employee::all();
        return view('admin.pages.employee.test',compact('title','employees'));
    }

    public function add_employee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:employees',
            'position' => 'required|min:2',
        ]);

        if ($validator->fails()) { 
            $data = array(
                'success' => false,
                'errors' => $validator->errors()->first()
            );
            return $data;
        }
        $user = Employee::create([
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
        ]);
        $user->code = "00".$user->id;
        $user->save();
        $data = array(
            'success' => true,
            'data' => $user,
        );
        return $data;
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
}
