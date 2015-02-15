@extends('layout')
@section('title')
Show Job
@stop
@section('content')
<ul>
  <table class="table table-striped table-bordered table-condensed">
    <tr>
      <td>Title:</td><td> {{ $job['title'] }} </td>
    </tr>
    <tr>
      <td>Description:</td><td>{{ $job['description'] }}</td>
    </tr>
    <tr>
      <td>Location:</td><td>{{ $job['location'] }}</td>
    </tr>
    <tr>
      <td>Salary:</td><td>{{ $job['salary'] }} </td>
    </tr>
    <tr>
      <td>Starting Date:</td><td>{{ $job['startingdate'] }}</td>
    </tr>
    <tr>
      <td>Ending Date:</td><td>{{ $job['endingdate'] }}</td>
    </tr>
  </table>
    @if ($hasApplied > 0 and Auth::user()->category == "Job Seeker")
  <h2>[(Already applied for job)]</h2>
    @elseif (Auth::user()->category == "Job Seeker")
      <h2>{{ link_to_route ('jobseeker.application', '[Apply]', $parameters = array( 'id' => $job['id'] ) ) }}</h2>
    @elseif ((Auth::user()->id) == $job['user_id'])
      <h2>{{ link_to_route ('employer.show', '[Options]', $parameters = array( 'id' => $job['id'] ) ) }}</h2>
    @endif

	</ul>
@stop