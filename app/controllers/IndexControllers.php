<?php
class IndexController extends BaseController {
	public function index()
{
    return view('index'); 
}

	/**
	 * Отобразить профиль соответствующего пользователя.
	 */
	public function showProfile($id)
	{
		$user = User::find($id);

		return View::make('user.profile', array('user' => $user));
	}

}
