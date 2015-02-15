@extends('layout3')
@section('title')
Register
@stop
@section('content')
  {{ Form::open(array('action' => 'UserController@store', 'method' => 'POST', 'files' => true)) }}

  <table class="table table-striped table-bordered table-condensed">
    <tr>
      <td>{{ Form::label('lblFirstName', 'First Name: ') }}</td><td>{{ Form::text('firstname') }}
      <font color='red'>{{ $errors->first('firstname') }}</font></td>
    </tr>
    <tr>
      <td>{{ Form::label('lblLastName', 'Last Name: ') }}</td><td>{{ Form::text('lastname') }}
      <font color='red'>{{ $errors->first('lastname') }}</font>
    </tr>
    <tr>
      <td>{{ Form::label('lblPhoneNumber', 'Phone Number: ') }}</td><td>{{ Form::text('phonenumber') }}
      <font color='red'>{{ $errors->first('phonenumber') }}</font></td>
    </tr>
    <tr>
      <td>{{ Form::label('lblEmailAddress', 'Email: ') }}</td><td>{{ Form::email('email') }}
      <font color='red'>{{ $errors->first('email') }}</font></td>
    </tr>
    <tr>
      <td>{{ Form::label('lblPassword', 'Password: ') }}</td><td>{{ Form::password('password') }}
      <font color='red'>{{ $errors->first('password') }}</font></td>
    </tr>
    <tr>
      <td>{{ Form::label('lblCategory', 'Category: ') }}</td><td>{{ Form::label('lblJobSeeker', 'Job Seeker: ') }}
      {{ Form::radio('category', 'Job Seeker') }}<font color='red'>{{ $errors->first('category') }}</font></td>
    </tr>
    <tr>
      <td></td><td>{{ Form::label('lblEmployer', 'Employer: ')}} {{ Form::radio('category', 'Employer') }}</td>
    </tr>
  </table>
  {{ Form::submit('Sign Up') }}<br/>
  {{ Form::close() }}
@stop