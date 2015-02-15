@extends('layout')
@section('title')
  View Applicant
@stop
@section('content')
  <h1>Applicant's Details:</h1>
  <table class="table table-striped table-bordered table-condensed">
    <tr>
      <td>First Name: </td><td> {{ $applicant['firstname'] }}</td>
    </tr>
    <tr>
      <td>Last Name: </td><td> {{ $applicant['lastname'] }}</td>
    </tr>
    <tr>
      <td>Email: </td><td> {{ $applicant['email'] }}</td>
    </tr>
    <tr>
      <td>Phone Number: </td><td> {{ $applicant['phonenumber'] }}</td>
    </tr>
    <tr>
      <td>Picture: </td><td>
      @if ( isset(User::find($applicant['id'])->image_file_name) ) 
        <img src='{{ asset( $applicant['image']->url("thumb") ) }}'></td>
      @else
        N/A
      @endif
    </tr>
  </table>
@stop
