{!! Form::open(array('route' => 'room.create')) !!}
{!! Form::token() !!}
<label>Title</label>
{!! Form::text('title') !!}<br>
<label>Description</label>
{!! Form::text('description') !!}<br>
{!! Form::submit('Create!!') !!}
{{Form::hidden('latitude', 40)}}
{{Form::hidden('longtitude', 140)}}
{!! Form::close() !!}