<?php

namespace App\Http\Requests\Teachers;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class CreateTeacher extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //role admin only
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "userId" => ["required", "integer", "exists:users,id"],
            "firstName" => ["required", "string", "max:255"],
            "lastName" => ["required", "string", "max:255"],
            "subject" => ["required", "string", "max:255"],
        ];
    }

    /**
     * assign new teacher to the techer's table
     */
    public function assignTeacher(): Teacher
    {
        $teacher = Teacher::create([
            "userId" => $this->userId,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "subject" => $this->subject,
        ]);

        return $teacher->makeHidden("updated_at" , "created_at");
    }
}
