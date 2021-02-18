<?php


namespace App\Api\V1\Requests;


use Dingo\Api\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'nullable|string|max:255',
            'newText' => 'nullable|string|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
