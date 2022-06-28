<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\User;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances'; 
    protected $guarded = []; 


    public function employee()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
