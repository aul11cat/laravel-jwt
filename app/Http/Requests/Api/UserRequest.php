<?php

namespace App\Http\Requests\Api;

class UserRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        $rules = [];

        switch ($method) {
            case 'GET':
                $rules = [
                    'id' => ['required,exists:shop_user,id']
                ];
                break;
            case "POST":
                $rules = [
                    'name' => ['required', 'max:12', 'unique:users,name'],
                    'password' => ['required', 'max:16', 'min:6'],
                    'email' => ['required', 'max:100', 'unique:users,email'],
                ];
                break;
            default:
                break;
        }

        return $rules;
    }

    /**
     * 驗證訊息
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'id.required'=>'使用者ID必須填寫',
            'id.exists'=>'使用者不存在',
            'name.unique' => '使用者名稱已經存在',
            'name.required' => '使用者名稱不能為空',
            'name.max' => '使用者名稱最大長度為12個字元',
            'password.required' => '密碼不能為空',
            'password.max' => '密碼長度不能超過16個字元',
            'password.min' => '密碼長度不能小於6個字元',
            'email.unique' => '電子郵件已經存在',
            'email.required' => '電子郵件不能為空',
            'email.max' => '電子郵件最大長度為100個字元',
        ];
    }
}
