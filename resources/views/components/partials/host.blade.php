          <li
              class="menu-item {{ Request::is('host/member') ? 'open' : '' }}  || {{ Request::is('host/zone') ? 'open' : '' }} || {{ Request::is('host/group') ? 'open' : '' }} || {{ Request::is('host/leader') ? 'open' : '' }}">
              <a class="menu-link menu-toggle ">
                  <i class="menu-icon tf-icons ti ti-user"></i>
                  <div class="" data-i18n="Work Management">Work Management</div>
              </a>

              <ul class="menu-sub">
                  <li class="menu-item {{ Request::is('host/member') ? 'active' : '' }}">
                      <a href="{{ route('member') }}" class="menu-link">
                          <div data-i18n="Members">Members</div>
                      </a>
                  </li>
                  <li class="menu-item {{ Request::is('host/zone') ? 'active' : '' }}">
                      <a href="{{ route('zone') }}" class="menu-link">
                          <div data-i18n="Zone">Zone</div>
                      </a>
                  </li>
                  <li class="menu-item {{ Request::is('host/group') ? 'active' : '' }}">
                      <a href="{{ route('group') }}" class="menu-link">
                          <div data-i18n="Group">Group</div>
                      </a>
                  </li>
                  <li class="menu-item {{ Request::is('host/leader') ? 'active' : '' }}">
                      <a href="{{ route('leader') }}" class="menu-link">
                          <div data-i18n="Sector Leader">Sector Leader</div>
                      </a>
                  </li>
              </ul>
          </li>
