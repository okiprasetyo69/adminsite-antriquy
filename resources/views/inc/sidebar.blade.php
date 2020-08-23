<div class="main-sidebar">
  <aside id="sidebar-wrapper">

    <div class="sidebar-brand">
      <div>
        <a href="/webadmin">
          <img src="{{asset("img/antriqhuy/icon.png")}}" style="width: 30%; position: relative;">
        </a>
      </div>
    </div>

    <ul class="sidebar-menu" style="margin-top: 10px;">

      @if(Session::get('role') == ADMIN_INSTANSI)

      <li class="nav-item dropdown {{ @$sidebar_active == 'queues'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'queues'? 'shadow' : '' }}" href="{{ url('/webadmin') }}"><i class="fas fa-briefcase-medical" style="font-size: 1.1em;"></i><span>Antrian</span></a>
      </li>

      <li class=" nav-item dropdown {{ @$sidebar_active == 'history'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'history'? 'shadow' : '' }}" href="{{ url('/history') }}"><i class="fas fa-history" style="font-size: 1.1em;"></i><span>Riwayat Antrian</span></a>
      </li>

      <li class="nav-item dropdown {{ @$sidebar_active == 'setting'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'setting'? 'shadow' : '' }}" href="{{ url('/settings') }}"><i class="fas fa-cog" style="font-size: 1.1em;"></i><span>Setting</span></a>
      </li>

      <li class="nav-item dropdown {{ @$sidebar_active == 'user_management'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'user-user_management'? 'shadow' : '' }}" href="{{ url('/user-management') }}"><i class="fas fa-id-card-alt" style="font-size: 1.1em;"></i><span>Manajemen User</span></a>
      </li>

      @elseif(Session::get('role') == STAFF_INSTANSI)

      <li class="nav-item dropdown {{ @$sidebar_active == 'queues'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'webadmin'? 'shadow' : '' }}" href="{{ url('/webadmin') }}"><i class="fas fa-briefcase-medical" style="font-size: 1.1em;"></i><span>Manajemen Antrian</span></a>
      </li>

      <li class="nav-item dropdown {{ @$sidebar_active == 'history'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'history'? 'shadow' : '' }}" href="{{ url('/history') }}"><i class="fas fa-history" style="font-size: 1.1em;"></i><span>Riwayat Antrian</span></a>
      </li>

      @elseif(Session::get('role') == ADMIN)

      <li class="nav-item dropdown {{ @$sidebar_active == 'instance'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'instance'? 'shadow' : '' }}" href="{{ url('/manajemen-instansi') }}"><i class="fas fa-plus-square" style="font-size: 1.1em;"></i><span>Manajemen Instansi</span></a>
      </li>

      <li class="nav-item dropdown {{ @$sidebar_active == 'user_management'? 'active' : '' }} pb-2">
        <a class="{{ @$sidebar_active == 'user_management'? 'shadow' : '' }}" href="{{ url('/user-management') }}"><i class="fas fa-id-card-alt" style="font-size: 1.1em;"></i><span>Manajemen User</span></a>
      </li>

      @endif

    </ul>

  </aside>
</div>