<?php

namespace App\Http\Controllers\Api;

use App\Helpers\LogActivity;
use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthorizationController extends BaseApiController
{
    public function auth(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken(
                env('APP_KEY')
            )->plainTextToken;
            $success['name'] = $authUser->name;

            LogActivity::addToLog('เข้าสู่ระบบผ่าน API');
            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', [
                'error' => 'Unauthorised',
            ]);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken(env('APP_KEY'))->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function profile(Request $request)
    {
        return $request->user();
    }

    public function destroy(Request $request)
    {
        LogActivity::addToLog('ออกจากระบบผ่าน API');
        $success['message'] = $request
            ->user()
            ->currentAccessToken()
            ->delete();
        return $this->sendResponse($success, 'User logout successfully.');
    }
}
