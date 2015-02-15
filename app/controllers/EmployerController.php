<?php

	/**
	 * EmployerController related functions that allow creating jobs, viewing applications.
	 * Author: Anthony Guevara
	 * Date: 2 June 2014
	 */
class EmployerController extends \BaseController {

	/**
	 * Display a listing of all jobs.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (Auth::check())
    {
      $user = Auth::user();
      $jobs = User::find(Auth::id())->jobs()->paginate(4);
      return View::make('employer.index', compact('jobs', 'user'));
    }
    else
    {
      return Redirect::route('index');
    }
	}


	/**
	 * Link to create jobs.
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('employer.create');
	}

	/**
	 * Store a newly created job in database.
	 *
	 * @return Response
	 */
	public function store()
	{
    $user = User::find(Auth::id());

    echo $user['email'];
    
    foreach ($user->jobs as $job)
    {
      echo $job->title . ' ' . $job->salary;
      echo "<br/>";
    }
    
    $input = Input::all();
    
    $v = Validator::make($input, Job::$rules);

    if ($v->passes())
    {
      $job = new Job();
      $job->title = e($input['title']);
      $job->description = e($input['description']);
      $job->location = e($input['location']);
      $job->salary = e($input['salary']);
      $job->startingdate = e($input['startingdate']);
      $job->endingdate = e($input['endingdate']);
      $job->user_id = Auth::id();
      $job->save();
      return Redirect::route('employer.index', $job->id);
    }
    else
    {
      return Redirect::action('EmployerController@create')->withErrors($v)->withInput($input);
    }
	}


	/**
	 * Show specific  job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    if (Auth::check())
    {
      $job = Job::find($id);
      $numberOfApplicants = Application::where('job_id',  '=', $id)->count();
      return View::make('employer.show', compact('job', 'numberOfApplicants'));
    }
	}

	/**
	 * Edit specific job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    if (Auth::check())
    {
		 $job = Job::find($id);
		 return View::make('employer.edit', compact('job'));
    }
	}


	/**
	 * Update specific job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
   
    $v = Validator::make($input, Job::$rules);
    
    $job = Job::find($id);
    if ($v->passes())
    {
      $job->title = e($input['title']);
      $job->description = e($input['description']);
      $job->location = e($input['location']);
      $job->salary = e($input['salary']);
      $job->startingdate = e($input['startingdate']);
      $job->endingdate = e($input['endingdate']);
      $job->save();
      return Redirect::route('employer.show', $job->id);
    }
    else
    {
      return Redirect::action('EmployerController@edit', array($job->id))->withErrors($v)->withInput($input);  
    }
	}


	/**
	 * Remove the specified job from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $job = Job::find($id);
		 $job->delete();
		 return Redirect::route('employer.index');
	}

  public function applicants($id)
  {
    $applicants = DB::table('applications')
      ->join('users', 'users.id', '=', 'applications.user_id')
      ->where('applications.job_id', '=', $id)
      ->get();
    
    return View::make( 'employer.applicants', compact('applicants') );
  }
  
  public function applicantdetails($id)
  {
    $applicant = User::find($id);
    return View::make( 'employer.applicantdetails', compact('applicant') );
  }

}
