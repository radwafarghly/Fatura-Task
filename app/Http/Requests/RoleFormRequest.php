<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 *
 */
class RoleFormRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_arabic' => 'required',
            'name_english' => 'required',
            'description_arabic' => 'sometimes|required',
            'description_english' => 'sometimes|required',
            'permissions' => 'required|array',
        ];
    }
}
