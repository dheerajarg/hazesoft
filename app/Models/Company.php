<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'location', 'contact','department_ids'];

    public function departmentName(){
        return $this->belongsTo(Department::class,'department_ids');
    }
}
