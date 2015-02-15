@extends('layout')
@section('title')
  Edit Job
@stop
@section('content')
  {{ Form::model($job, array('method' => 'PUT', 'route' => array('employer.update', $job['id']))); }}
  <table class="table table-striped table-bordered table-condensed">
  <tr>
    <td>{{ Form::label('lblTitle', 'Title: ') }}</td>
    <td>{{ Form::text('title', $job['title'] ) }}
        <font color='red'>{{ $errors->first('title') }}</font></td>
  </tr>
  <tr>
    <td>{{ Form::label('lblDescription', 'Description: ') }}</td>
    <td>{{ Form::textarea('description', $job['description'] ) }}
        <font color='red'>{{ $errors->first('description') }}</font></td>
  </tr>
  <tr>
    <td>{{ Form::label('location', 'Location: ') }}</td>
    <td>{{ Form::text('location', $job['location'] ) }}
        <font color='red'>{{ $errors->first('location') }}</font></td>
  </tr>
  <tr>
    <td>{{ Form::label('lblSalary', 'Salary: ') }}</td>
    <td>{{ Form::text('salary', $job['salary'] ) }}
    <font color='red'>{{ $errors->first('salary') }}</font></td>
  </tr>
  <tr>
    <td>{{ Form::label('lblStartingDate', 'Starting Date: ') }}</td>
    <td>  {{ Form::text('startingdate', $job['startingdate'] ) }}
    <font color='red'>{{ $errors->first('startingdate') }}</font></td>
  </tr>
  <tr>
    <td>{{ Form::label('lblEndingDate', 'Ending Date: ') }}</td>
    <td>{{ Form::text('endingdate', $job['endingdate'] ) }}
    <font color='red'>{{ $errors->first('endingdate') }}</font></td>
  </tr>
</table>

  {{ Form::submit('Update', ['class' => 'btn-warning']) }}
  {{ Form::close() }}

@stop