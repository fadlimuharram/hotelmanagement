@extends('adminlayout')
@section('pagecontent')
  <div class="row">

    <div class="col-md-8">
      @include('admin.roomsettings.type')
      @include('admin.roomsettings.status')
    </div>
    <div class="col-md-4">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Tooltips on buttons</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-12">

      
    </div>
  </div>
@endsection
