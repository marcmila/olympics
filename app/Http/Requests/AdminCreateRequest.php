<?php


namespace App\Http\Requests;


class AdminCreateRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100'
        ];
    }
}
