<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Infrastructure\Models\User;
use Illuminate\Http\Request;

/**
 *
 */
class UserFormRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request, User $user)
    {
        $action = $request->route()->getActionName();
        $actionName = trim(strstr($action, '@'), '@');
        $method = $request->getMethod();
        if ($method == 'POST') {
            if($actionName == 'store'){
                return [
                    //'id' => 'required|integer|exists:users',
                    "password"=>"required",
                    "name" => "required",
                    "email" => "required|email|unique:users",
                    'roles' =>'required|array',
                ];
            }

        } else if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    "firstname" => "sometimes|required",
                    "email" => "sometimes|required|email|unique:users,email,{$this->user->id}",
                    "password"=>"sometimes|required",
                    'roles' =>'required|array',

                ];
            }
        }
    }
}
