@extends('indexlayout')
@section('title')
  Job Search Ultra
@stop
@section('content')
<div class="row">
  <div class="col-lg-6  welcome">
    <div style="font-family: Shadows Into Light;">
      <div class="big">Job Search Ultra</div>
      @if (isset($loginError))
        {{ $loginError }}
      @endif
    </div>
    {{ Form::open(array('action' => 'UserController@login')) }}
    <table>
      <tr>
        <td>
          {{ Form::label('lblUsername', 'E-mail: ') }}
        </td>
        <td>
          {{ Form::text('email') }}<br/>
        </td>
      </tr>
      <tr>
        <td>
          {{ Form::label('lblPassword', 'Password: ') }}
        </td>
        <td>
          {{ Form::password('password') }}<br/>
        </td>
      </tr>
      <tr>
        <td>
          {{ Form::submit('Login', ['class' => 'btn-primary']) }}
        </td>
      </tr>
      <tr>
          Don't have an account? {{ link_to_route('user.create', 'Register') }}
      </tr>
      {{ Form::close() }}
    </table>
    <div class="recentQueries col-lg-6">
      <b>Recently Postings:<b><br/><br/>
      <table>
        @foreach ($recentJobs as $job)
        <tr>
          <td><div style="font-family: raleway;"> {{ $job->title }} </div></td><td><em>{{ $job->created_at }}</em></td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@stop