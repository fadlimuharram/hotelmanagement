<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Types</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addtypemodal"><span class="fa fa-pencil"></span></button>
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>No</th>
          <th>Type</th>
          <th>Price Perhour</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($gettype as $key => $value)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->name_type }}</td>
            <td>{{ $value->priceperhour }}</td>
            <td>
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#edithoteltype{{$value->id}}">Edit</button>
              <button type="button" class="btn btn-danger btn-xs" onclick="hapustype('{{$value->id}}','{{ csrf_token() }}','{{ $value->name_type }}')">Delete</button>

             </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @foreach ($gettype as $key => $value)
      <div id="edithoteltype{{$value->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit {{ $value->name_type }}</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="{{ url('types/'.$value->id) }}" method="post">
                <fieldset>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="nametype">Type</label>
                  <div class="col-md-8">
                  <input name="_method" type="hidden" value="PUT">
                  <input id="nametype" name="nametype" placeholder="Insert Type Name" class="form-control input-md" required="" type="text" value="{{ $value->name_type }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="price">Price Perhour</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                      <input id="price" name="price" class="form-control" placeholder="Insert Room Type Price" required="" type="number" value="{{ $value->priceperhour }}">
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="Send"></label>
                  <div class="col-md-9">
                    <button id="Send" name="Send" class="btn btn-success">Send</button>
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
    <!--Modal Add Type-->
    <div id="addtypemodal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Type</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="{{ url('types') }}" method="post">
              <fieldset>

              <div class="form-group">
                <label class="col-md-3 control-label" for="nametype">Type</label>
                <div class="col-md-8">
                <input id="nametype" name="nametype" placeholder="Insert Type Name" class="form-control input-md" required="" type="text">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="price">Price Perhour</label>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="price" name="price" class="form-control" placeholder="Insert Room Type Price" required="" type="number">
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="Send"></label>
                <div class="col-md-9">
                  <button id="Send" name="Send" class="btn btn-success">Send</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

              </fieldset>
              </form>
          </div>
        </div>

      </div>
    </div>
    <!--End Modal Add Type-->
  </div>
</div>
