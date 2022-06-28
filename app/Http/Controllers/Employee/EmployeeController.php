<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $title = 'Employee Dashboard';
        return view('employee.pages.dashboard',compact('title'));
    }
    public function mark_attendance_view()
    {
        $title = 'Mark Attendance';
        return view('employee.pages.mark_attendance',compact('title'));
    }
    public function mark_attendance()
    {
        $title = 'Mark Attendance';
        return view('employee.pages.mark_attendance',compact('title'));
    }
    
}
