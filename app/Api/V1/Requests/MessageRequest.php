<?php


namespace App\Api\V1\Requests;


use Dingo\Api\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
