<?php

namespace App\Traits;


trait SalaryDue 
{
	public function isOldEmployee()
	{
		return count($this->transactions) > 0 ? true : false;
	}
	public function lastTransaction()
	{
		return $this->isOldEmployee() ? $this->transactions()->orderBy('id','DESC')->first() : null;
	}

	public function lastTransactionDate()
	{
		return $this->isOldEmployee() ? $this->lastTransaction()->created_at->toDateTimeString() : \Carbon\Carbon::createFromFormat('Y-m-d', $this->started_from)->toDateTimeString();
	}

	public function lastTransactionAmount()
	{
		return $this->isOldEmployee() ? $this->lastTransaction()->transaction_amount : 0;
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