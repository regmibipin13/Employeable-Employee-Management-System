<?php

namespace App\Traits;


trait SalaryDue 
{
	public function lastTransaction()
	{
		return $this->transactions()->orderBy('id','DESC')->first();
	}

	public function lastTransactionDate()
	{
		return $this->lastTransaction()->created_at->toDateTimeString();
	}

	public function lastTransactionAmount()
	{
		return $this->lastTransaction()->transaction_amount;
	}

	public function accordingToType()
	{
		if($this->salary_type == 'daily') {
			return 1;
		} elseif ($this->salary_type == 'weekly') {
			return 7;
		} else {
			return 30;
		}
	}

	public function salaryPerDay()
	{
		return round($this->salary / $this->accordingToType());
	}

	public function totalDueDate()
	{
		return \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',\Carbon\Carbon::now()->toDateTimeString())->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$this->lastTransactionDate()));
	}

	public function totalDueSalary()
	{
		return $this->salaryPerDay() * $this->totalDueDate();
	}


}