<?php

namespace App\Http\Requests\API;

use App\Models\type_document;
use InfyOm\Generator\Request\APIRequest;

class Updatetype_documentAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = type_document::$rules;
        $rules['name'] = $rules['name'].",".$this->route("type_document");
        return $rules;
    }
}
