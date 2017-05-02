@extends('adminlayout');
@section('pagecontent')
  <div class="col-md-8">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Data Hotel</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        The body of the box <br />
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>

  <div class="col-md-4">
    <div class="box box-success">
            <div class="box-body box-profile">
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editprofilemodal"><span class="fa fa-pencil"></span></button>
              <img class="profile-user-img img-responsive img-circle" src="{{ asset($datapic['dirprofile'] . Auth::user()->picture) }}" alt="User Profile">

              <h3 class="profile-username text-center">{{ ucwords(Auth::user()->name) }}</h3>

              <p class="text-muted text-center">Website Admin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-success btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
  </div>


  <div id="editprofilemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{ url('editprofile') }}" enctype="multipart/form-data">
          <fieldset>


          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-6">
            <input id="name" name="name" placeholder="Insert Your Name" class="form-control input-md" required="" type="text" value="{{ Auth::user()->name }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-6">
            <input id="email" name="email" placeholder="Insert Your Email" class="form-control input-md" required="" type="email" value="{{ Auth::user()->email }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-6">
            <input id="password" name="password" placeholder="Password" class="form-control input-md" type="Password">
            <span class="help-block">Insert Here If You Want To Change Your Password Or Leave It Empty</span>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="confirmpass">Confirm Password</label>
            <div class="col-md-6">
            <input id="confirmpass" name="confirmpass" placeholder="Condirm Password" class="form-control input-md" type="Password">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="picprofile">Profile Picture</label>
            <div class="col-md-4">
              <input id="picprofile" name="picprofile" class="input-file" type="file" accept="image/*">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="send"></label>
            <div class="col-md-4">
              <button id="send" name="send" class="btn btn-success">Update</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

          </fieldset>
          </form>
      </div>
    </div>

  </div>
</div>
@endsection

<!--
INSERT INTO `users` (`id`, `name`, `email`, `picture`, `is_register`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('0', 'Fadli aja', 'FadliAja@blogpadli.com', '1c4ca4238a0b923820dcc509a6f75849b1.png', 't', '$2y$10$rSXeTLdOnVp7VJxOnonRdunaZ1FQriHIEbbQlW.RszUCAjHYzvWyS', 'ySwTg1xnJnpxPKnEMTWGqoxefxrCkFKIIybYpJ0So9qfwgn6LPFWY6EDL7A1', '2017-04-29 20:10:55', '2017-04-30 12:23:41')
-->
