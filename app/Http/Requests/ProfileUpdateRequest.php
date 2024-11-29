<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            // 'profile_picture' => ['nullable','file','image','mimes:jpg,jpeg,png','max:4096'],
            'phone'=> ['nullable','string'],
            'github_link'=> ['nullable','string'],
            'linkedin_link'=> ['nullable','string'],
            'resume_link'=> ['nullable','string'],
            'about_me'=> ['nullable','string'],
        ];
    }
}
