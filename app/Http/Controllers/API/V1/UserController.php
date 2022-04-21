<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User as UserModel;
use Validator;

class UserController extends Controller
{

    public function show($id)
    {
        $user = UserModel::findOrFail($id);

        return ResponseBuilder::success(['user' => new  UserResource($user)]);
    }

}
