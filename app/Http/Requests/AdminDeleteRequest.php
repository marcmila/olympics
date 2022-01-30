<?php


namespace App\Http\Requests;


class AdminDeleteRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric'
        ];
    }
}
