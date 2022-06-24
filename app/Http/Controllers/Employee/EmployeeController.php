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
    
}
