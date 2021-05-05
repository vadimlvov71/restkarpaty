<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App;

class LanguageController extends Controller
{
    function languageRoute($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
    public function setLanguage(Request $request, string $language = ""){
		if(!empty($language)){
			echo "language: ".$language."<br>";
			//exit;
			try {
				if (array_key_exists($language, config('locale.languages'))) {
					Session::put('locale', $language);
					App::setLocale($language);
					$segments = str_replace(url('/'), '', url()->previous());
					echo "<pre>";
					print_r(url()->previous());
					echo "</pre>";
					exit;
					$segments = str_replace(url('/'), '', url()->previous());
					$segments = array_filter(explode('/', $segments));
					array_shift($segments);
					array_unshift($segments, $language);

					return redirect()->to(implode('/', $segments));
				}
				//return redirect('/en');
			} catch (\Exception $exception) {
				//return redirect('/en');
			}
		}else{
			$default_language = config('locale.default_language');
			$language = $default_language[0];
			echo "language nope:".$language." <br>";
			Session::put('locale', $language);
			App::setLocale($language);
			return redirect('/'.$language);
		}
	}
}
