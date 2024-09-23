<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, (ValidationRule | array<mixed> | string)>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'max:300', 'min:1'],
            'user_id' => [
                'required',
                'exists:users,id',
            ],
            'published_at' => [
                'required',
                'exists:users,id',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
