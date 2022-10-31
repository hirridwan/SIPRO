<div> 
  <div class="main-sidebar">
      <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <a href="#">{{$appName}}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <a href="#">{{$appShortName}}</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            @foreach($role->menus as $menu)
              @if($menu->parent_id==0)
              <li class="nav-item dropdown {{$dropdownState}}" wire:click='dropdownClick()'>
                <a href="#" class="nav-link has-dropdown"><i class="{{$menu->icon}}"></i><span>{{$menu->name}}</span></a>
                <ul class="dropdown-menu">
                  @foreach($role->menus as $parent)
                    @if($parent->parent_id==$menu->id)
                    <li class="active"><a href="{{route($parent->route_name)}}" class="nav-link">{{$parent->name}}</a></li>
                    @endif
                  @endforeach
                </ul>
              </li>
              @endif
            @endforeach
          </ul>
      </aside>
  </div>
</div>
