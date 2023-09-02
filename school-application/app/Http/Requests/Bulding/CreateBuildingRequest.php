<?php

namespace App\Http\Requests\Bulding;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Building;

class CreateBuildingRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:buildings',
        ];
    }

    public function createBuilding() : Building
    {
        $building = Building::create([
            'name' => $this->name,
        ]);

        return $building;
    }
}
