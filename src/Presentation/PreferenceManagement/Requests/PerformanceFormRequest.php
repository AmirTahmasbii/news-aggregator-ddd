<?php

declare(strict_types=1);

namespace Presentation\PreferenceManagement\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class PerformanceFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => ['string', 'min:3'],
            'category' => ['string', 'min:3'],
            'source_id' => ['integer', 'exists:sources,id'],
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $this->parseErrors($validator->errors()),
        ], 422));
    }

    protected function parseErrors($errors)
    {
        $parsedErrors = [];
        foreach ($errors->all() as $key => $error) {
            $parsedErrors[] = $error;
        }

        return $parsedErrors;
    }
}
