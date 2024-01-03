 <li class="menu-header small text-uppercase">
     <span class="menu-header-text">Maps</span>
 </li>
 <li class="menu-item {{ Request::is('elocations/elocationsmap') ? 'active' : '' }}"> <a
         href="{{ route('elocationsmap') }}" class="menu-link"> <i class="menu-icon tf-icons ti ti-map"></i>
         <div> Maps</div>
     </a> </li>
 <li class="menu-header small text-uppercase"> <span class="menu-header-text">Others</span> </li>
 <li class="menu-item"> <a href="maps-leaflet.html" class="menu-link"> <i class="menu-icon tf-icons ti ti-settings"></i>
         <div>Setting</div>
     </a> </li>
 <li
     class="menu-item {{ Request::is('empnotifications/empnotification') ? 'active' : '' }} || {{ Request::is('empnotifications/addempnotification') ? 'active' : '' }}">
     <a href="{{ route('allnotification') }}" class="menu-link"> <i class="menu-icon tf-icons ti ti-bell"></i>
         <div> Notification</div>
     </a>
 </li>
