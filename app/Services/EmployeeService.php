<?php

namespace App\Services;

use App\Employee;
use App\Events\Employees\NewEmployeeRegistrationEvent;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeService {
	private $role;
	public function __construct() {
		$this->role = Role::where('title', 'Employee')->first();
	}
	public function createUserAccount(Request $request) {
		$password = Str::random(8);
		$user     = User::firstOrCreate([
				'name'     => $request->name,
				'email'    => $request->email,
				'password' => Hash::make($password),
			]);
		$user->roles()->sync($this->role->id);
		event(new NewEmployeeRegistrationEvent($user, $this->createPasswordResetToken($user)));
		return $user;
	}
	public function updateUserAccount(Request $request, Employee $employee) {
		$user = User::find($employee->user_id);
		$user->update([
				'name'  => $request->name,
				'email' => $request->email,
			]);
		$user->roles()->sync($this->role->id);
		return $user;
	}

	private function createPasswordResetToken($user) {
		$random = Str::random(64);
		$data   = DB::table('password_resets')->where('email', $user->email)->first();
		if (!$data) {
			DB::table('password_resets')->insert([
					'email'      => $user->email,
					'token'      => Hash::make($random),
					'created_at' => Carbon::now(),
				]);
		} else {
			DB::table('password_resets')->where('email', $user->email)->update([
					'token' => Hash::make($random)
				]);
		}
		return $random;
	}
}