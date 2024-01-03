          <li
              class="menu-item {{ Request::is('meeting/allmeeting') ? 'open' : '' }}  || {{ Request::is('meeting/tometting') ? 'open' : '' }} || {{ Request::is('meeting/mestatus') ? 'open' : '' }}">
              <a class="menu-link menu-toggle ">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div class="" data-i18n="Meeting">Meeting</div>
              </a>

              <ul class="menu-sub">
                  <li class="menu-item {{ Request::is('meeting/allmeeting') ? 'active' : '' }}">
                      <a href="{{ route('allmeeting') }}" class="menu-link">
                          <div data-i18n="Meeting History">Meeting History</div>
                      </a>
                  </li>
                  <li class="menu-item {{ Request::is('meeting/tometting') ? 'active' : '' }}">
                      <a href="{{ route('tometting') }}" class="menu-link">
                          <div data-i18n="Meeting Schedule">Meeting Schedule</div>
                      </a>
                  </li>
                  <li class="menu-item {{ Request::is('meeting/mestatus') ? 'active' : '' }}">
                      <a href="{{ route('mestatus') }}" class="menu-link">
                          <div data-i18n="Meeting Status">Meeting Status</div>
                      </a>
                  </li>
              </ul>
          </li>
