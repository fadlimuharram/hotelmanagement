@if (count($errors) > 0)
  <div id="erroreditprofile">{{ count($errors) }}</div>
    @foreach ($errors->all() as $err)
      <div class="alert alert-dismissible alert-danger errorclass">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $err }}</strong>
      </div>
    @endforeach
@endif
