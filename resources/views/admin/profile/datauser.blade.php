<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Data Admin</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Profile</th>
          <th>Email</th>
          <th>KTP</th>
          <th>Registered</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getusers as $key => $value)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value->name }}</td>
            <td>
              <?php $profile = ($value->picture) ? $value->picture : 'defaultuser.png'; ?>
                <img src="{{ asset($datapic['dirprofile'] . $profile) }}" class="img-responsive" width="50px">

            </td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->ktp }}</td>
            <td>
              @if (Auth::user()->id == $value->id)
                <a href="#" class="btn btn-success btn-xs disabled">Cannot Edit</a>
                @else
                  @if ($value->is_register == 't')
                    <button class="btn btn-success btn-xs"  onclick="revokeaccess('{{ $value->id }}','{{ $value->name }}','{{ csrf_token() }}')">Revoke Access</button>
                  @elseif ($value->is_register == 'f')
                    <button class="btn btn-success btn-xs" onclick="acceptaccess('{{ $value->id }}','{{ $value->name }}','{{ csrf_token() }}')">Accept Access</button>
                  @endif
              @endif
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
