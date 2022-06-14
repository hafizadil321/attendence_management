<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances'; 
    protected $guarded = []; 


    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'emp_id');
    }
}
