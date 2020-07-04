<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiBaseController
{
    /**
     * @return string
     */
    public function index()
    {
        return User::paginate(2);
    }

    public function show(User $user){
        return $user;
    }


    /**
     * @param UserRequest $request
     * @return string
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());
        return '使用者註冊成功。。。';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function login(Request $request)
    {
        $attempt = [
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email
        ];
        $res = Auth::guard('web')->attempt($attempt);
        if ($res) {
            return '使用者登入成功...';
        }
        return '使用者登入失敗';
    }
}
