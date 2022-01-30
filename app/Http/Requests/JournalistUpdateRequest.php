<?php


namespace App\Http\Requests;


class JournalistUpdateRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric',
            'name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'passport' => 'string|max:255',
            'company_name' => 'string|max:255',
        ];
    }
}
