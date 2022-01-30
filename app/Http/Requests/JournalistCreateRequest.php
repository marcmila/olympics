<?php


namespace App\Http\Requests;


class JournalistCreateRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'passport' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ];
    }
}
