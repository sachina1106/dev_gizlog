
@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
  {{-- <form method="post" action="{{route('reports.update',[$report->id])}}"> --}}
    {!! Form::open(['route'=>['reports.update',$report->id],'method'=>'PUT']) !!}
      {{-- <input class="form-control" name="user_id" type="hidden" value="4"> --}}
      <div class="form-group form-size-small {{ $errors->has('reporting_time')? 'has-error' : '' }}">
        {{-- <input class="form-control" name="reporting_time" type="date"value="?>"> --}}
        {!! Form::input('data','reporting_time',$report->reporting_time->format('Y-m-d'),['required','class'=>'form-control'])!!}
      <span class="help-block">{{ $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group  {{ $errors->has('title')? 'has-error' : '' }}">
        {{-- <input class="form-control" placeholder="Title" name="title" type="text" value=""> --}}
        {!!Form::input('text','title',$report->title,['required','class'=>'form-control'])!!}
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group {{ $errors->has('content')? 'has-error' : '' }}">
        {{-- <textarea class="form-control" placeholder="本文" name="content" cols="50" rows="10"></textarea> --}}
        {!!Form::textarea('content',$report->content,['required','class'=>'form-control'])!!}
        <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      {{-- <button type="submit" class="btn btn-success pull-right">Update</button> --}}
      {!!Form::submit('Update',['class'=>'btn btn-success pull-right'])!!}
    {!!Form::close()!!}
  </div>
</div>

@endsection
