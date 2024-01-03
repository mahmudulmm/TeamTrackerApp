           <li
               class="menu-item has-arrow {{ Request::is('employees/allemp') ? 'open' : '' }} || {{ Request::is('employees/addemp') ? 'open' : '' }} || {{ Request::is('emposts/emppost') ? 'open' : '' }} || {{ Request::is('employees/empattendence') ? 'open' : '' }} || {{ Request::is('leaves/leave_apl') ? 'open' : '' }} || {{ Request::is('holidays/holiday') ? 'open' : '' }} ">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                   <i class="menu-icon tf-icons ti ti-id-badge"></i>
                   <div data-i18n="HR">HR</div>
               </a>
               <ul class="menu-sub">
                   <li class="menu-item {{ Request::is('employees/allemp') ? 'active' : '' }} ">
                       <a href="{{ route('allemp') }}" class="menu-link">
                           <div data-i18n="All Employee">All Employee</div>
                       </a>
                   </li>

                   <li class="menu-item {{ Request::is('emposts/emppost') ? 'active' : '' }}">
                       <a href="{{ route('emposts.emppost') }}" class="menu-link">
                           <div data-i18n="Posts">Posts</div>
                       </a>
                   </li>

                   <li class="menu-item {{ Request::is('employees/empattendence') ? 'active' : '' }}">
                       <a href="{{ route('empattendence') }}" class="menu-link">
                           <div data-i18n="Attendence">Attendence</div>
                       </a>
                   </li>

                   <li class="menu-item {{ Request::is('leaves/leave_apl') ? 'active' : '' }}">
                       <a href="{{ route('leave_apl') }}" class="menu-link">
                           <div data-i18n="Leave Request">Leave Request</div>
                       </a>
                   </li>
                   <li class="menu-item {{ Request::is('holidays/holiday') ? 'active' : '' }}">
                       <a href="{{ route('holidays.holiday') }}" class="menu-link">
                           <div data-i18n="Holidays">Holidays</div>
                       </a>
                   </li>
               </ul>
           </li>
