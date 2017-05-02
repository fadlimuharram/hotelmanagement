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
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>205</h6>
                <span class="fa fa-home"></span>
              </span>
              <div class="info-box-content">
              </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>
        <div class="col-md-2">
          <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red">
                <h6>201</h6>
                <span class="fa fa-home"></span>
              </span>
          </div><!-- /.info-box -->
        </div>

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
    </div><!-- /.box -->

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  </div>

@endsection
