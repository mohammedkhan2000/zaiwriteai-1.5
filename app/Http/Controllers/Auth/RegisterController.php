<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVerification;
use App\Models\Package;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'first_name.required' => 'This field is required.',
            'last_name.required' => 'This field is required.',
            'email.required' => 'This field is required.',
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        if ($user['email_verification_status'] == true) {
            return redirect()->route('user.email.verify', $user['user']->verify_token);
        } else {
            $this->guard()->login($user['user']);
            return redirect()->route('user.dashboard');
        }
    }

    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $userStatus = USER_STATUS_ACTIVE;
            if (getOption('email_verification_status', 0) == 1) {
                $userStatus = USER_STATUS_UNVERIFIED;
            }
            $user =  User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'role' => USER_ROLE_USER,
                'email' => $data['email'],
                'status' => $userStatus,
                'password' => Hash::make($data['password']),
                'verify_token' => str_replace('-', '', Str::uuid()->toString())
            ]);

            $duration = (int)getOption('trail_duration', 1);

            $defaultPackage = Package::where(['is_trail' => ACTIVE])->first();
            setUserPackage($user->id, $defaultPackage, $duration);
            DB::commit();
            if (getOption('email_verification_status', 0) == 1) {
                Mail::to($user->email)->send(new UserEmailVerification($user));
                $data['email_verification_status'] = true;
                $data['user'] = $user;
                return $data;
            } else {
                $data['email_verification_status'] = false;
                $data['user'] = $user;
                return $data;
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages(['name' => __(SOMETHING_WENT_WRONG)]);
        }
    }
}
