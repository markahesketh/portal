<?php

namespace Lio\Users;

use Auth;
use Lio\Http\Requests\Request;

class SaveSettingsRequest extends Request
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'username' => 'required|max:255|unique:users,username,'.Auth::id(),
        ];
    }
}