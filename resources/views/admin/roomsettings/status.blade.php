<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Status</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaladdstatus"><span class="fa fa-pencil"></span></button>
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>No</th>
          <th>Status</th>
          <th>Color</th>
          <th>Icon</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getstatus as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->namestatus }}</td>
            <td>
                <div style="background-color:{{$value->hex_color}};width:100%;height:10px;"></div>
            </td>
            <td>
              <img src="{{ ($value->icon!=null) ? url($datapic['diricon'] . $value->icon) : '' }}" class="img-responsive" width="30px">
            </td>
            <td>
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editstatus{{$value->id}}">Edit</button>
              <button type="button" class="btn btn-danger btn-xs" onclick="hapusstatus('{{$value->id}}','{{ csrf_token() }}','{{ $value->namestatus }}')">Delete</button>

             </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    @foreach ($getstatus as $key => $value)
      <div id="editstatus{{ $value->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit {{ $value->namestatus }}</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="{{ url('status/'.$value->id) }}" method="post" enctype="multipart/form-data">
                <fieldset>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="namestatus">Name</label>
                  <div class="col-md-6">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input id="namestatus" name="namestatus" placeholder="Insert Status" class="form-control input-md" required="" type="text" value="{{ $value->namestatus }}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="hex_color">Color</label>
                  <div class="col-md-3">
                  <input name="hex_color" placeholder="Insert Color" class="form-control input-md hex_color" required="" type="text" value="{{ $value->hex_color }}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="icon">Current Icon</label>
                  <div class="col-md-9">

                    <img src="{{ ($value->icon!=null) ? url($datapic['diricon'] . $value->icon) : '' }}" class="img-responsive" width="60px" alt="no icon">
                  </div>
                </div>

                <!-- Multiple Radios (inline) -->
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="pilihediticon{{$key}}">Edit Icon</label>
                    <div class="col-md-9">
                      <label class="radio-inline" for="pilihediticon{{$key}}-0">
                        <input name="pilihediticon" id="pilihediticon{{$key}}-0" value="nochange" checked="checked" type="radio">
                        No Change
                      </label>
                      <label class="radio-inline" for="pilihediticon{{$key}}-1">
                        <input name="pilihediticon" id="pilihediticon{{$key}}-1" value="replace" type="radio">
                        Replace Current Icon
                      </label>
                      <label class="radio-inline" for="pilihediticon{{$key}}-2">
                        <input name="pilihediticon" id="pilihediticon{{$key}}-2" value="kosong" type="radio">
                        Make Null
                      </label>
                    </div>
                  </div>

                <div class="form-group editiconupload">
                  <label class="col-md-3 control-label" for="icon">Edit Icon</label>
                  <div class="col-md-9">
                    <input id="icon" name="icon" class="input-file" type="file" accept="image/*">
                    <span class="help-block">Optional if you want use some icon, recommended with transparent background</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="send"></label>
                  <div class="col-md-4">
                    <button id="send" name="send" class="btn btn-success">Send</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

                </fieldset>
                </form>
            </div>
          </div>

        </div>
      </div>
    @endforeach
  </div><!-- /.box-body -->
</div><!-- /.box -->

<div id="modaladdstatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Status</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ url('status') }}" method="post" enctype="multipart/form-data">
          <fieldset>

          <div class="form-group">
            <label class="col-md-3 control-label" for="namestatus">Name</label>
            <div class="col-md-6">
            <input id="namestatus" name="namestatus" placeholder="Insert Status" class="form-control input-md" required="" type="text">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="hex_color">Color</label>
            <div class="col-md-3">
            <input id="hex_color" name="hex_color" placeholder="Insert Color" class="form-control input-md" required="" type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="icon">Icon</label>
            <div class="col-md-9">
              <input id="icon" name="icon" class="input-file" type="file" accept="image/*">
              <span class="help-block">Optional if you want use some icon, recommended with transparent background</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="send"></label>
            <div class="col-md-4">
              <button id="send" name="send" class="btn btn-success">Send</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

          </fieldset>
          </form>
      </div>
    </div>

  </div>
</div>
