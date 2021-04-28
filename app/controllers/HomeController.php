<?php
namespace App\Http\Controllers;
use app\Requests;
use Illuminate\Http\Requests;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

   public function index() {
    $lastActivity = Spatie\Activitylog\Models\Activity::all();
    return view('activity'), compact('lastActivity'));
   }

}
?>
