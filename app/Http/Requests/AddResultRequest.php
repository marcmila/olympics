<?php


namespace App\Http\Requests;


class AddResultRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'competitor_id' => 'required|numeric',
            'modality' => 'required|string|max:255',
            'position' => 'required|numeric'
        ];
    }
}
