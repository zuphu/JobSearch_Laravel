@extends('layout')
@section('title')
  Create Job Posting
@stop
@section('content')
	<ul>
		{{ Form::open(array('action' => 'EmployerController@store')) }}
		{{ Form::label('lblTitle', 'Job Title: ') }}<br/>
		{{ Form::text('title') }}<br/>
    <font color='red'>{{ $errors->first('title') }}</font><br/>

		{{ Form::label('lblDescription', 'Job Description: ') }}<br/>
		{{ Form::text('description') }}<br/>
    <font color='red'>{{ $errors->first('description') }}</font><br/>

		{{ Form::label('lblLocation', 'Location: ') }}<br/>
		{{ Form::text('location') }}<br/>
    <font color='red'>{{ $errors->first('location') }}</font><br/>

		{{ Form::label('lblSalary', 'Salary: ') }}<br/>
		{{ Form::text('salary') }}<br/>
    <font color='red'>{{ $errors->first('salary') }}</font><br/>

		{{ Form::label('lblStartDate', 'Posting Start: ') }}<br/>
		{{ Form::text('startingdate') }}<br/>
    <font color='red'>{{ $errors->first('startingdate') }}</font><br/>

		{{ Form::label('lblEndDate', 'Posting End: ') }}<br/>
		{{ Form::text('endingdate') }}<br/>
    <font color='red'>{{ $errors->first('endingdate') }}</font><br/>

		{{ Form::submit('Create') }}<br/>
		{{ Form::close() }}
	</ul>
@stop