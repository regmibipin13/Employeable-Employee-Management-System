<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	 */

	use ResetsPasswords;

	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	public function resetEmployeePassword(Request $request) {
		$request->validate([
				'email'    => 'required',
				'token'    => 'required',
				'password' => 'required|min:8|confirmed'
			]);

		$tokenData = DB::table('password_resets')->where('email', $request->email)->first();

		$user = User::where('email', $request->email)->first();
		if (!Hash::check($request->token, $tokenData->token)) {
			return redirect()->back()->withErrors('This Token Does not match');
		}
		$response = $this->broker()->reset(
			$this->credentials($request), function ($user, $password) {
				$this->resetPassword($user, $password);
			}
		);

		if ($response == Password::PASSWORD_RESET) {
			$user->update([
					'last_login_at' => Carbon::now(),
					'last_login_ip' => $request->getClientIp(),
				]);
		}

		return $response == Password::PASSWORD_RESET
		?$this->sendResetResponse($request, $response)
		:$this->sendResetFailedResponse($request, $response);
	}

}
