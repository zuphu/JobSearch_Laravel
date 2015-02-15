@extends('layout')
@section('title')
Show Created Jobs
@stop
@section('content')
  <table class="table table-striped table-bordered table-condensed">
    <tr>
      <td>Title:</td><td>{{ $job['title'] }}</td>
    </tr>
    <tr>
      <td>Description:</td><td>{{ $job['description'] }}</td>
    </tr>
      <td>Location:</td><td>{{ $job['location'] }}</td>
    <tr>
      <td>Salary:</td><td>{{ $job['salary'] }}</td>
    </tr>
      <td>Starting Date:</td><td>{{ $job['startingdate'] }}</td>
    <tr>
      <td>Ending Date:</td><td>{{ $job['endingdate'] }}</td>
    </tr>
  </table>

  <h2>{{ link_to_route('employer.edit', '[Edit]', array( 'id' => $job['id']) ) }}</h2>
    
    @if ($numberOfApplicants > 0)
      <h2>{{ link_to_route('employer.applicants', '[View Applications]', $parameters = array( 'id' => $job['id'] ) ) }}</h2>
    @else
      [No Applicants]
    @endif
    
    {{ Form::open(array('method' => 'DELETE', 'route' => array('employer.destroy', $job->id))) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
		{{ Form::close() }}
@stop