@extends('adminlayout');
@section('pagecontent')
  <div class="col-md-8">
    @include('admin.profile.datahotel')
    @include('admin.profile.datauser')
  </div>

  <div class="col-md-4">
    @include('admin.profile.currentprofile')
  </div>
@endsection

<!--
INSERT INTO `users` (`id`, `name`, `email`, `picture`, `is_register`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('0', 'Fadli aja', 'FadliAja@blogpadli.com', '1c4ca4238a0b923820dcc509a6f75849b1.png', 't', '$2y$10$rSXeTLdOnVp7VJxOnonRdunaZ1FQriHIEbbQlW.RszUCAjHYzvWyS', 'ySwTg1xnJnpxPKnEMTWGqoxefxrCkFKIIybYpJ0So9qfwgn6LPFWY6EDL7A1', '2017-04-29 20:10:55', '2017-04-30 12:23:41')
-->
