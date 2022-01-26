<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Set url params.
     * @return array
     */
    public function validationData(): array
    {
        return array_merge($this->route()->parameters(), $this->all());
    }
}
