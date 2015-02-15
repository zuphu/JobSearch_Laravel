@extends('layout')
@section('title')
  Apply
@stop
@section('content')
  <table class="table table-striped table-bordered table-condensed">
    <tr>
      <td>Job: </td><td> {{ $job['title'] }} <br/>
    </tr>
    <tr>
      <td>Description: </td><td> {{ $job['description'] }} </td>
    </tr>
  </table>

		{{ Form::open(array('action' => 'JobSeekerController@store') ) }}
		{{ Form::label('lblLetter', 'Job Application Letter: ') }}<br/>
		{{ Form::textarea('applicationletter') }} <br/>
    <font color='red'>{{ $errors->first('applicationletter') }}</font><br/>
		{{ Form::submit('Submit Application', ['class' => 'btn-info']) }}
    {{ Form::hidden('jobID', $job['id'])  }} <br/>
		{{ Form::close() }}
@stop
