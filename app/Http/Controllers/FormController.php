<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'patronymic' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|array',
            'phone.*' => 'nullable|string',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'about' => 'nullable|string|max:1000',
            'rules' => 'required|accepted',
        ]);

        $validatedData['phone'] = json_encode($validatedData['phone'] ?? []);

        try {
            FormData::create($validatedData);
            return response()->json(['message' => 'Данные успешно сохранены'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ошибка сохранения данных: ' . $e->getMessage()], 500);
        }
    }
}
