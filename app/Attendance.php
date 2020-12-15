<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenancy;

class Attendance extends Model
{
	use Multitenancy;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
