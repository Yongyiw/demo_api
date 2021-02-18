<?php


namespace App\Api\V1\Requests;


use Dingo\Api\Http\FormRequest;

class GetMessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|int'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
