@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
  {{-- <form action="{{route('reports.store')}}" method="post"> --}}
    {!!Form::open(['route'=>'reports.store'])!!}
      {{-- <input class="form-control" name="user_id" type="hidden"> --}}
      {{-- {!!Form::input('hidden','user_id',['class'=>'form-control'])!!} --}}
      <div class="form-group form-size-small  {{ $errors->has('reporting_time')? 'has-error' : '' }}">
    {{-- <input class="form-control" name="reporting_time" type="date"> --}}
{!!Form::input('date','reporting_time',null,['class'=>'form-control'])!!}

    <span class="help-block">{{ $errors->first('reporting_time') }}</span>
    </div>
    <div class="form-group  {{ $errors->has('title')? 'has-error' : '' }}">
      {{-- <input class="form-control" placeholder="Title" name="title" type="text"> --}}
      {!!Form::input('text','title',null,['class'=>'form-control','placeholder'=>'Title'])!!}
      <span class="help-block">{{ $errors->first('title') }}</span>
    </div>
    <div class="form-group  {{ $errors->has('content')? 'has-error' : '' }}">
      {{-- <textarea class="form-control" placeholder="Content" name="content" cols="50" rows="10"></textarea> --}}
      {!!Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Content'])!!}
      {{-- {!!Form::textarea('content',$report->content,['class'=>'form-control'])!!} --}}
      <span class="help-block">{{ $errors->first('content') }}</span>
    </div>
    {{-- <button type="submit" class="btn btn-success pull-right">Add</button> --}}
    {!!Form::submit('Add',['class'=>'btn btn-success pull-right'])!!}
    {{-- {!!Form::close()!!} --}}
  </form>
  </div>
</div>

@endsection
