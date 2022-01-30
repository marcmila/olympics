<?php


namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Olympics\Domain\Staff\StaffType;

class AdminCreateRequest extends AbstractFormRequest
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
            'staff_type' => [
                'required',
                Rule::in(StaffType::toArray())
            ],
            'unsubscribed_date' => 'date|date_format:Y-m-d|required_if:staff_type,==,admin',
            'birth_date' => 'date|date_format:Y-m-d|required_if:staff_type,==,competitor',
            'company_name' => 'string|max:255|required_if:staff_type,==,journalist',
            'judge_id' => 'numeric|required_if:staff_type,==,judge',
        ];
    }
}
