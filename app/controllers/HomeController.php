<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
  {
    $user = User::find(1);

    echo $user['email'];
    
    foreach ($user->jobs as $job)
    {
      echo $job->title . ' ' . $job->salary;
      echo "<br/>";
    }

//    return View::make('hello');
  }

}
