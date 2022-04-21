<?php

namespace App\Http\Controllers\API\V1;

use App\Constants\ErrorCodes;
use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => 'required|string|min:8',
            ]);
            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), 422, ErrorCodes::VALIDATION);

            }
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                $user = Auth::user();
                $tokenResult = $user->createToken('appToken');
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addMonths(3);
                $token->save();

                DB::commit();

                return ResponseBuilder::success(['access_token' => $tokenResult->accessToken,], ('You have successfully logged in'));
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => ['required', 'email',],
                'password' => 'required|confirmed|min:8',
            ]);
            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), 422, ErrorCodes::VALIDATION);
            }

            $user = UserModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $tokenResult = $user->createToken('appToken');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addMonths(12);
            $token->save();

            DB::commit();
            return ResponseBuilder::success(['access_token' => $tokenResult->accessToken], 'You have been successfully registered');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $token->delete();
        return ResponseBuilder::success(null, 'You have been logged out successfully!', 200);

    }

}
