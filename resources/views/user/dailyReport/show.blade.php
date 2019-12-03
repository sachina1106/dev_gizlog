@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      {{$report->reporting_time->format('m/d (D)')}}
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-layout">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{$report->title}}</td>
          </tr>
          <tr>
            <th class="table-column">Content</th>
            <td class='td-text'>{!! nl2br(e($report->content)) !!}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    <a class="btn btn-edit" href="{{route('reports.edit', ['id'=>$report->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="btn-delete">
      {!!Form::open(['route'=>['reports.destroy', $report->id], 'method'=>'DELETE'])!!}
      <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
      {!!Form::close()!!}
      </form>
    </div>
  </div>
</div>

@endsection
