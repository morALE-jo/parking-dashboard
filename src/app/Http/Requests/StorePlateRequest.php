<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /* AM_NOTE: validation of plate, date and optional values will happen here
            - Licence plate: required
                ● 1 to 3 characters before the hyphen (M-AA123)
                ● 1 or 2 characters after the hyphen (M-AA123)
                ● A maximum 4 digits number in the end (can’t start with a 0) (M-AA123)
            - owner: text, optional
            - start_date, end_date: date format, optional
        */
        // AM_NOTE: Setting all values to required since they were not being saved otherwise
        // Pending investigation
        return [
            'plate' => 'required',
            'owner' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
}
