<?php

namespace App\Traits;

use App\User;

use Illuminate\Database\Eloquent\Builder;

trait Multitenancy {

	protected static function bootMultitenancy() 
	{
		// Only sees the records if the employee id of that record and auth user id matched if user is employee
		if(auth()->user()->hasRole('title','Employee')) {
			static::addGlobalScope('employee_id', function(Builder $builder){
				$builder->where('employee_id',auth()->user()->employee->id);
			});
		}
	}

}