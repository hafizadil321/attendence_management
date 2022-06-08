<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('admin.pages.dashboard',compact('title'));
    }
    public function employees()
    {
        $title = 'Employee';
        return view('admin.pages.employee.list',compact('title'));
    }
}
