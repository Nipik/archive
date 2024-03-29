<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($lang)
    {
        if (in_array($lang, ['en', 'ja', 'zh', 'ru','fr','ko'])) {
            Session::put('lang', $lang);
            App::setLocale($lang);
        }

        return redirect()->route('home');
    }
    public function getLang()
    {
        return App::getLocale() ?? config('app.locale');
    }
}
