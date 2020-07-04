<?php

namespace App\Http\Requests\Api;


use Illuminate\Support\Facades\Auth;

class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        Auth::guard('web')->attempt(['name' => $request->name, 'password' => $request->password])
//        $this->post();
//        return [
            //
//        ];
    }
}
