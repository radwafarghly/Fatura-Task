<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Infrastructure\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
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
                    "firstname" => "required",
                    "lastname" => "required",
                    "phone" => "required|unique:users",
                    // 'photo' => 'sometimes|required',
                    "email" => "required|email|unique:users",
                    // "bio" => "sometimes|required",
                    "address"=>"sometimes|required",
                    // "job"=>"sometimes|required",
                    "gender"=>"required",
                    "martial_status"=>"required",
                    "type"=>"required",
                    "photo"=> "sometimes|required",
                    "birthdate"=>"required|date|date_format:Y-m-d|before_or_equal:".\Carbon\Carbon::now()->subYears(12)->format('Y-m-d'),
                    'city_id' => 'required|integer|exists:cities,id',
                    'country_id' => 'required|integer|exists:countries,id',
                    'roles' =>'required_if:type,admin|array',
                    'languages' =>'required_if:type,doctor|array',
                    "main_job"=>"sometimes|required",
                    "specialization" =>"sometimes|required",
                    "nationality_id" =>"sometimes|required",
                    'level'=>"sometimes|required",
                    "neighborhood"=>"sometimes|required",
                    "street"=>"sometimes|required",
                    "sign"=>"sometimes|required",




                ];
            }

        } else if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    // 'id' => 'required|integer|exists:users',
                    "firstname" => "sometimes|required",
                    "lastname" => "sometimes|required",
                    "phone" => "sometimes|required|unique:users,phone,{$this->user->id}",
                    // 'photo' => 'sometimes|required',
                    "email" => "sometimes|required|email|unique:users,email,{$this->user->id}",
                    // "bio" => "sometimes|required",
                    "address"=>"sometimes|required",
                    "gender"=>"sometimes|required",
                    "martial_status"=>"sometimes|required",
                    "type"=>"required",
                    "birthdate"=>"sometimes|required|date|before_or_equal:".\Carbon\Carbon::now()->subYears(12)->format('Y-m-d'),
                    'city_id' => 'sometimes|required|integer|exists:cities,id',
                    'country_id' => 'sometimes|required|integer|exists:countries,id',
                    'roles' =>'required_if:type,admin|array',
                    'languages' =>'required_if:type,doctor|array',
                    "main_job"=>"sometimes|required",
                    "specialization" =>"sometimes|required",
                    "nationality_id" =>"sometimes|required",
                    'level'=>"sometimes|required",
                    "neighborhood"=>"sometimes|required",
                    "street"=>"sometimes|required",
                    "sign"=>"sometimes|required",



                ];
            }
        }
    }
}
