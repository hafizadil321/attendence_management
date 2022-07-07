<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $title = 'Employee Dashboard';
        return view('employee.pages.dashboard',compact('title'));
    }
    public function profile()
    {
        $title = 'Employee Profile';
        return view('employee.pages.profile',compact('title'));
    }
    public function mark_attendance_view()
    {
        $title = 'Mark Attendance';
        $attendance = Attendance::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->first();
        return view('employee.pages.mark_attendance',compact('title','attendance'));
    }
    public function mark_attendance()
    {
        $employee = User::where('id', auth()->user()->id)->first();
        if ($employee) {
            $attendance = Attendance::where('user_id', $employee->id)->whereDate('created_at', Carbon::today())->first();
            if ($attendance) {
                if($attendance->check_out == null) {
                    $attendance->check_out = Carbon::now();
                    $attendance->save();
                    return redirect()->route('/employee/mark_attendance')->with('success','Attendance Marked successfully.');
                }
            }else{
                $attendance = Attendance::create([
                    'user_id' => $employee->id,
                    'check_in' => Carbon::now(),
                ]);
                return redirect()->route('/employee/mark_attendance')->with('success','Attendance Marked successfully.');
            }
        }else{
            return redirect()->route('/employee/mark_attendance')->with('success','User created successfully.');
        }
    }
    public function attendance()
    {
        $title = 'Attendance';
        $attendance = Attendance::where('user_id', auth()->user()->id)->get();
        dd($attendance);
        return view('employee.pages.attendance',compact('title','attendance'));
    }
}
