<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:50"],
            "email" => ["required", "string", "email", "unique:users"],
            "password" => ["required", "string", "min:8"],
        ];
    }

    /**
     * Register a new user.
     */
    public function registerUser() : User
    {
        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password),
        ]);

        return $user->makeHidden("updated_at" , "created_at");
    }
}
