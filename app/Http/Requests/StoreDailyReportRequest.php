<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDailyReportRequest extends FormRequest
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
        return [
            'report' => ['required', 'max:2000'],
            'date' => [
                'required', 'date', "after_or_equal:-$this->route('project')->num_allowed_days days", 'before_or_equal:today',
                Rule::unique('daily_reports')->where(function ($query) {
                    return $query
                        ->where([
                            'user_id' => $this->user()->id,
                            'date' => $this->date,
                            'project_id' => $this->route('project')->id,
                        ]);
                }),
            ],
            'hours' => ['required', 'numeric', 'min:1', 'max:12'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'date.unique' => 'You have already submitted a report for this date.',
        ];
    }
}
