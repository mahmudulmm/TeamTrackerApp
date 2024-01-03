           <li
               class="menu-item has-arrow {{ Request::is('paymento/paymentop') ? 'open' : '' }} || {{ Request::is('ptype/type') ? 'open' : '' }} || {{ Request::is('statements/statement') ? 'open' : '' }}">
               <a href="javascript:void(0);" class="menu-link menu-toggle">
                   <i class="menu-icon fas-icons fa fa-dollar"></i>
                   <div data-i18n="Payemnt">Payemnt</div>
               </a>
               <ul class="menu-sub">
                   <li class="menu-item {{ Request::is('paymento/paymentop') ? 'active' : '' }} ">
                       <a href="{{ route('paymentop') }}" class="menu-link">
                           <div data-i18n="Payment Operator ">Payment Op</div>
                       </a>
                   </li>
                   <li class="menu-item {{ Request::is('ptype/type') ? 'active' : '' }} ">
                       <a href="{{ route('type') }}" class="menu-link">
                           <div data-i18n="Payment Type">Payment Type</div>
                       </a>
                   </li>
                   <li class="menu-item {{ Request::is('statements/statement') ? 'active' : '' }} ">
                       <a href="{{ route('statement') }}" class="menu-link">
                           <div data-i18n="Billing Statement">Billing Statement</div>
                       </a>
                   </li>

               </ul>
           </li>
