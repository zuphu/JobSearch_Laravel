@extends('layout')
@section('title')
  Index
@stop
@section('content')
<h1>Applican Details:</h1>
  @foreach ($applicants as $applicant)
<div class="well well-sm">
    Name: {{ link_to_route ( "employer.applicantdetails", $applicant->firstname . " " . $applicant->lastname, array ( $applicant->id ) ) }}<br/>
    Application: {{ $applicant->applicationletter }}<br/>
    Submitted: {{ $applicant->dateofapplication }}<br/><br/>
</div>
  @endforeach
@stop
