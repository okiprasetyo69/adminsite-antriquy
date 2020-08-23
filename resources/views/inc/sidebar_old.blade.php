@php ($permission = json_decode(Session::get('permission'), true))
@php ($modul = Session::get('module'))
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="position: relative; height: 150px;">
      <div style="position: absolute; background-color: #6FA887; width: 110%; height: 100%; border-radius: 15px; left: -30px; top: -15px; border: 10px solid #D9F5E6;">
        <a href="index.html" style="width: 60px; height: 60px; margin-left: 15px;">
          <img src="{{asset("img/custom/main_logo.png")}}" style="width: 30%; position: relative;">
          <p style="color: white; font-size: 10px;">Satria Pangan Prima</p>
        </a>
      </div>

    </div>
    <!-- <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">AGP</a>
    </div> -->
    <ul class="sidebar-menu" style="margin-top: 10px;">
      @foreach($modul as $row)
      @if (count($row['menu']) > 0)
      <?php
      $countPermission = 0;
      foreach ($row['menu'] as $menu) {
        $index = $row["kode_modul"] . "_" . $menu["kode_menu"];
        if (array_key_exists($index, $permission)) {
          if ($permission[$row["kode_modul"] . "_" . $menu["kode_menu"]]["active"] == true) {
            $countPermission++;
          }
        }
      }
      ?>
      @if ($countPermission > 0)
      <li class="nav-item dropdown {{@$active[$row["kode_modul"]]}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><img src="{{asset(@$active[$row["kode_modul"]] == 'active'?$row['icon_active']:$row['icon'])}}"> <span>{{$row['nama']}}</span></a>
        <ul class="dropdown-menu">
          @foreach($row['menu'] as $menu)
          <?php $index = $row["kode_modul"] . "_" . $menu["kode_menu"]; ?>
          @if(array_key_exists($index, $permission))
          @if(@$permission[$index]["active"] == true)
          <li class="{{@$active[$row["kode_modul"].'_'.$menu["kode_menu"]]}}">
            <a class="nav-link" href="{{url(env('ALIAS_PERUSAHAAN').$row['url'].$menu['url'])}}">{{$menu['nama_menu']}}</a>
          </li>
          @endif
          @endif
          @endforeach
        </ul>
      </li>
      @endif
      @else
      @if(@$permission[@$row["kode_modul"]]["active"] == true)
      @if($row["kode_modul"] == 'jadwal')
      @else
      <li class="nav-item dropdown {{@$active[$row["kode_modul"]]}}">
        <a href="{{url(env('ALIAS_PERUSAHAAN').$row['url'])}}" class="nav-link "><img src="{{@$active[$row["kode_modul"]] == 'active'? url($row['icon_active']):url($row['icon'])}}"><span>{{$row['nama']}}</span></a>
      </li>
      @endif
      @endif
      @endif
      @endforeach



    </ul>
    <div style="display: none;" class="sidebar-brand">
      <!-- TODO -->
      <img src="{{asset("img/custom/bg.png")}}">
    </div>
  </aside>
</div>