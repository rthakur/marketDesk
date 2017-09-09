@php
$activePage = Request::segment(1);
@endphp
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                     <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                  </div>
              </li>
            <li>
                <a href="/"><span class="nav-label">Companies</span></a>

                @if(Auth::user()->email == 'rthakur.dev@gmail.com')
                <a href="/manage" @if($activePage == 'manage') class="active" @endif ><span class="nav-label">Manage Companies</span></a>
                @endif
                
                <a href="/portfolio" @if($activePage == 'portfolio' &&  Request::segment(2) != 'future' ) class="active" @endif ><span class="nav-label">Active Portfolio</span></a>
                <a href="/portfolio/future" @if($activePage == 'portfolio' &&  Request::segment(2) == 'future' ) class="active" @endif><span class="nav-label">Future Portfolio</span></a>
            </li>
        </ul>
    </div>
</nav>
