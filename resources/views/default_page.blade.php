@extends('layouts.app')

@section('content')

<div class="section-body">
  <form class="form-inline mr-auto">
    <div class="search-element" style="width: 100%;">
      <div class="form-group" style="position: relative;">
        <div class="input-group mb-3">

          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
          <div class="input-group-append">
            <button class="btn" type="submit" style="background-color: white; border: 1px solid #E4E6FC;"><i class="fas fa-search"></i></button>
          </div>
          
        </div>
        <div class="input-group mb-3 " style="position: absolute; right: 0;">
          <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah </a>
          <a href="#" class="btn btn-icon icon-left btn-success" id="modal-5"><i class="fas fa-plus"></i> Modal </a>
        </div>

      </div>

    </div>


  </form>
  <div class="card">
    <div class="card-header">
      <!-- <h4>Example Card</h4> -->
    </div>
    <div class="card-body">
      <?php $items = array("banana","egg","milk","apple","bread") ?>
      @foreach($items as $row)
      <ul>
        <li>
          {{$row}}    
        </li>
      </ul>
      @endforeach

    </div>
    <div class="card-footer bg-whitesmoke">
      This is card footer
    </div>
  </div>
</div>
<!-- Modal -->
<form class="modal-part" id="modal-login-part">
  <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
  <div class="form-group">
    <label>Username</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-envelope"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label>Password</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-lock"></i>
        </div>
      </div>
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group mb-0">
    <div class="custom-control custom-checkbox">
      <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
      <label class="custom-control-label" for="remember-me">Remember Me</label>
    </div>
  </div>
</form>

@endsection
@section('pagespecificscripts')
<script type="text/javascript">

  $(document).ready(function() {
    $('#example').DataTable(
    {
      'searching': false,
      "lengthChange": false,
    }
    );
    $("#modal-5").fireModal({
      title: 'Login',
      body: $("#modal-login-part"),
      footerClass: 'bg-whitesmoke',
      autoFocus: false,
      onFormSubmit: function(modal, e, form) {
      // Form Data
      let form_data = $(e.target).serialize();
      console.log(form_data)

      // DO AJAX HERE
      let fake_ajax = setTimeout(function() {
        form.stopProgress();
        modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

        clearInterval(fake_ajax);
      }, 1500);

      e.preventDefault();
    },
    shown: function(modal, form) {
      console.log(form)
    },
    buttons: [
    {
      text: 'Login',
      submit: true,
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
      }
    }
    ]
  });
    
  } );
</script>
@stop