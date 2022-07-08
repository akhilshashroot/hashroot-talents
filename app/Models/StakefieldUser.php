<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakefieldUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill_set',
        'experience',
        'turnaround_time',
        'availability',
        'employee_id',
        'rate',
        'name',
        'email',
        'skill_data',
        'comments',
        'ectc'
    ];
}
