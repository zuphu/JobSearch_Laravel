<?php

	/**
	 * JobSeekerController related functions. Viewing jobs, applying for jobs, etc.
	 * Author: Anthony Guevara
	 * Date: 2 June 2014
	 */
use Carbon\Carbon;
class JobSeekerController extends \BaseController {

	/**
	 * Display list of all jobs.
	 *
	 * @return Response
	 */
	public function index()
	{
    if (Auth::check())
    {
      $dateNow = Carbon::now();
      $fmt = $dateNow->format('Y-m-d H:i:s');

      $input = Input::all();

      if (isset($input['search']))
      {
        $search = $input['search'];
        $search = trim($search);
      }
      if (!empty($search))
      {
        try
        {
          $jobs = Job::whereRaw('description like "%' . $search . '%"
          or location like "%' . $search . '%"
          or title like "%' . $search . '%"
          or salary >= "' . $search. '"
          and endingdate <= "' . $fmt . '"')->paginate(5);
        }
        catch(QueryException  $e)
        {
        }
      }
      else
      {
        $jobs = DB::table('jobs')
        ->where('endingdate', '>=', $fmt)
        ->paginate(5);
  //      $jobs = Job::whereRaw("endingdate >= '2014-05-05'")->get()->paginate(5);
      }

      return View::make( 'jobseeker.index', compact('jobs') );
    }
    else
    {
      return Redirect::route('index');      
    }
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a new application in the database.
	 *
	 * @return Response
	 */
	public function store()
  {
    $input = Input::all();

    $v = Validator::make($input, Application::$rules);

    if ($v->passes())
    {
      $application = new Application;
      $application->applicationletter = $input['applicationletter'];
      $now = new DateTime();
      $application->dateofapplication = $now->format('Y-m-d H:i:s');
      $application->user_id = Auth::user()->id;
      $application->job_id = $input['jobID'];
      $application->save();
      return Redirect::action('JobSeekerController@index');
    }
    else
    {
      return Redirect::back()->withErrors($v);
//      return View::make('JobSeekerController.index');
//      return Redirect::action('JobSeekerController@index')->withErrors($v)->withInput($input)->withInput('');
    }
  }

	/**
	 * Display a specific job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $page = 0;
    $items_per_page = 30;
    $offset = $page * $items_per_page;

    $job = Job::find($id);
    $userID = Auth::user()->id;
    $hasApplied = Application::where('user_id', '=', $userID)
                        ->where('job_id',  '=', $id)->count();

    return View::make('jobseeker.show', compact('job', 'hasApplied'));
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
  
  //Show application view
  public function application($id)
	{
    $job = Job::find($id);
    return View::make('jobseeker.application', compact('job'));
	}

  //show number of days remaining for job posting
  public static function timeRemaining($date)
  {
//    $startingDate = new DateTime($date);
    $dateEnd = new Carbon($date);
    $dateNow = Carbon::now();
    $interval = $dateNow->diff($dateEnd);

    return "This job expires in " .($interval->days) . " days";
  }

  //search job postings
  public function search()
  {
    $input = Input::all();
    $search = $input['search'];

    $jobs = Job::whereRaw('description like "%' . $search . '%"
    or location like "%' . $search . '%"
    or title like "%' . $search . '%"')->paginate(5);

//     $jobs = Job::where('description', 'like', '%' . $search. '%')
//       ->where('description', 'like', '%' . $search. '%')
//       ->paginate(5);

      return View::make('jobseeker.index', compact('jobs'));
//        return Redirect::action('jobseeker.index', compact('jobs'));
  }
}
