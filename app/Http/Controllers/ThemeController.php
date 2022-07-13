<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetThemeThemeRequest;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function setTheme(SetThemeThemeRequest $request){
        session([
            'theme.brightness' => $request->input('brightness','dark'),
            'theme.color' => $request->input('color','green'),
        ]);
        return back();
    }
}
