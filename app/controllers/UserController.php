<?php

	/**
	 * UserController related functions.
	 * Author: Anthony Guevara
	 * Date: 2 June 2014
	 */

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $recentJobs = DB::table('jobs')
      ->orderBy('created_at', 'ascending')
      ->take(5)->get();
    return View::make('index', compact('recentJobs', 'loginError'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('user.create');
	}

	/**
	 * Store a newly created user in database.
	 *
	 * @return Response
	 */
	public function store()
	{
    $input = Input::all();
    
    $v = Validator::make($input, User::$rules);
    
    if ($v->passes())
    {
      $password = $input['password'];
      $encrypted = Hash::make($password);

      $user = new User;
      $user->email           = e($input['email']);
      $image = Input::hasFile('image');
      if ($image != null)
      {
        $user->image = Input::file('image');
        //$user->image           = $input['image'];
      }
      $user->firstname       = e($input['firstname']);
      $user->lastname        = e($input['lastname']);
      $user->phonenumber     = e($input['phonenumber']);
      $user->category        = e($input['category']);
      $user->password        = e($encrypted);
      $user->remember_token  = "default";
      $user->save();
      return Redirect::action('UserController@index');
    }
    else
    {
      return Redirect::action('UserController@create')->withErrors($v)->withInput($input);      
    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

  //authenticate user
  public function login()
  {
    $userdata = array(
      'email' => Input::get('email'),
      'password' => Input::get('password')
    );

    if (Auth::attempt($userdata))
    {
      if (Auth::user()->category == "Employer")
        return Redirect::action('EmployerController@index');
      else
        return Redirect::action('JobSeekerController@index');
    }
    else
    {
      $loginError = "Invalid username or password";
      return Redirect::action('UserController@index')->with($loginError);
    }
  }

  //log user out
  public function logout()
  {
   Auth::logout();
   return Redirect::action('UserController@index');
  }

  //readme docs
  public function readMe()
  {
    return View::make('readme.doc');
  }
}
