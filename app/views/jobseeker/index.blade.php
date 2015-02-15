@extends('layout')
@section('title')
  Index
@stop
@section('content')
  <ul>
    {{ Form::open(array('action' => 'JobSeekerController@index', 'method' => 'GET')) }}
      Search: {{ Form::text('search'); }} {{ Form::submit('Search') }} <br/>
    {{ Form::close() }}

  @if ($jobs->count() == 0)
    No Job Results
  @endif
    
  @foreach ($jobs as $job)
    <li><b>Title:</b> {{ link_to_route('jobseeker.show', $job->title, $parameters = array( 'id' => $job->id ) ) }}</li>
    <b>Description:</b> {{ $job->description }}<br/>
    {{ JobSeekerController::timeRemaining($job->endingdate) }}<br/><br/>
  @endforeach

    {{ $jobs->appends(Input::except(array('page')))->links() }}

</ul>
@stop