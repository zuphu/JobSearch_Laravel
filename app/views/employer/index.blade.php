@extends('layout')
@section('title')
  Index
@stop
@section('content')
<a class="ay" href="{{ URL::to('employer/create') }}">+ Create New Job</a><br/><br/>
  <ul>
  @foreach ($jobs as $job)
    <div class="well well-lg">
      <li>{{ link_to_route('employer.show', $job['title'], $parameters = array( 'id' => $job['id'] ) ) }}</li>
      {{ $job['description'] }}
    </div>
	@endforeach
  </ul>
  {{ $jobs->links() }}
@stop
