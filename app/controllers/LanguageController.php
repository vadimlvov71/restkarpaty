<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    function languageRoute($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
