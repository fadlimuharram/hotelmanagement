@extends('adminlayout');
@section('pagecontent')
  <div class="col-md-12" id="dashboard">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Input</h3>
        <div class="box-tools pull-right">
          <div class="has-feedback">
            <input type="text" class="form-control input-sm" placeholder="Search Room Number">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        @foreach ($getrooms as $value)
          <div class="col-md-2" data-toggle="modal" data-target="#roommodal{{$value->id}}">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon" style="background-color:{{$value->status->hex_color}};">
                  <h6><strong>{{ $value->rnumber }}</strong></h6>
                  @if ($value->status->icon != null)
                    <img src="{{ asset($datapic['diricon'] . $value->status->icon) }}" width="40px" class="center-block img-responsive" style="padding-top:5px;padding-left:5px;">
                  @endif
                </span>
                <div class="info-box-content">
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
        @endforeach


        <div class="col-md-2 pointercursor" data-toggle="modal" data-target="#myModal">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon">
                <h5>Add</h5>
                <span class="fa fa-plus"></span>
              </span>
          </div><!-- /.info-box -->
        </div>

      </div><!-- /.box-body -->
      @foreach ($getrooms as $value)
        <div id="roommodal{{ $value->id }}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Status : {{ $value->status->namestatus }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div><!-- /.box -->

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add More Rooms</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{ url('Rooms') }}">
          <fieldset>

          <div class="form-group">
            <label class="col-md-4 control-label" for="rnumber">Room Number</label>
            <div class="col-md-6">
            <input id="rnumber" name="rnumber" placeholder="Insert Room Number" class="form-control input-md" required="" type="text">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="type">Room Type</label>
            <div class="col-md-6">
              <select id="type" name="type" class="form-control">
                @foreach ($gettype as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name_type }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="status">Room Status</label>
            <div class="col-md-6">
              <select id="status" name="status" class="form-control">
                @foreach ($getstatus as $value)
                    <option value="{{ $value->id }}">{{ $value->namestatus }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="send"></label>
            <div class="col-md-4">
              <button id="send" name="send" class="btn btn-primary">Send</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

          </fieldset>
          </form>

      </div>
    </div>

  </div>
</div>

  </div>

@endsection
