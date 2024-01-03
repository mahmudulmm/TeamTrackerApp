           <li class="menu-item has-arrow {{ Request::is('order/allorder') ? 'open' : '' }} ">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                   <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                   <div data-i18n="Order">Order</div>
               </a>
               <ul class="menu-sub">
                   <li class="menu-item {{ Request::is('order/allorder') ? 'active' : '' }} ">
                       <a href="{{ route('allorder') }}" class="menu-link">
                           <div data-i18n="All Order">All Order</div>
                       </a>
                   </li>


               </ul>
           </li>
