<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <span style="flex-direction : unset;">
        <div class="ml-5" style="margin-bottom:0 !important;">
          @foreach(@$breadcrumbs as $breadcrumb)
            <a class="breadcrumb-link" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a> > 
          @endforeach
        </div>
        <h2 class="ml-5" style="margin-bottom:0 !important;">{{@$title}}</h2>
        @if( isset($haveBack) )
        <span class="cursor-hover" onclick="back('<?php echo $urlBack; ?>');"> <i class="fas fa-chevron-circle-left"></i> Kembali ke {{@$namePageBack}} </span>
        @endif
      </span>
      <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
    </ul>
  </div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown">
      <div class="d-sm-none d-lg-inline-block nav-link dropdown-toggle nav-link-lg nav-link-user nav-profile-item">
        <h6 class="title">{{ @Auth::user()->fullname }}</h6>
      </div>
      <div id="profile-button" data-toggle="dropdown" class="d-sm-none d-lg-inline-block nav-link dropdown-toggle nav-link-lg nav-link-user" style="position: relative; font-size: 12px; right: 50px;">
        <img alt="image" src="../../img/avatar/avatar-2.png" id="foto_profil" class="rounded-circle">
      </div>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <i class="fas fa-sign-out-alt"></i> Logout
          </form>
        </a>
      </div>
    </li>
  </ul>
</nav>