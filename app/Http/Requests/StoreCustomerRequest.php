<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:25', 'regex:/^\+?(?=(?:\D*\d){7,15}\D*$)[0-9\s().-]+$/'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'marketing_consent' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'first_name.string' => 'Your first name must be text.',
            'first_name.max' => 'Your first name must be 255 characters or fewer.',
            'last_name.required' => 'Please enter your last name.',
            'last_name.string' => 'Your last name must be text.',
            'last_name.max' => 'Your last name must be 255 characters or fewer.',
            'email.required' => 'Please enter your email address.',
            'email.string' => 'Your email address must be text.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Your email address must be 255 characters or fewer.',
            'phone.required' => 'Please enter your phone number.',
            'phone.string' => 'Your phone number must be text.',
            'phone.max' => 'Your phone number must be 25 characters or fewer.',
            'phone.regex' => 'Please enter a valid phone number with 7 to 15 digits.',
            'date_of_birth.required' => 'Please enter your date of birth.',
            'date_of_birth.date' => 'Please enter a valid date of birth.',
            'date_of_birth.before' => 'Your date of birth must be in the past.',
            'marketing_consent.in' => 'Please choose yes or no for marketing consent.',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'email' => 'email address',
            'phone' => 'phone number',
            'date_of_birth' => 'date of birth',
            'marketing_consent' => 'marketing consent',
        ];
    }
}
