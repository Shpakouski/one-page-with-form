<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainPageController extends Controller
{
    public function index()
    {
        return view('main-page');
    }

    public function submit(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'birth_date' => 'required|date',
            'email' => 'nullable|email',
            'phone' => 'required_without:email|array|min:1',
            'phone.*' => 'required|regex:/^\+\d{1,4} \d{7,12}$/',
            'marital_status' => 'required',
            'about' => 'nullable|max:1000',
            'agree' => 'accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return redirect()->route('main.page')->with('success', 'Успешно отправлено!');
    }
}
