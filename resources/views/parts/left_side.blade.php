<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{asset('cms/images/avatar.jpg')}}" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="#"><i class="mdi-action-face-unlock"></i> Profil</a>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="mdi-hardware-keyboard-tab"></i> Çıkış</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#"
                       data-activates="profile-dropdown">{{ \Illuminate\Support\Facades\Auth::user()->name }}<i
                            class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">Administrator</p>
                </div>
            </div>
        </li>
        <li class="bold"><a href="{{route('index')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>
                Dashboard</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                            class="mdi-social-person"></i> Kişiler</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('person.index')}}">Kişi Listesi</a>
                            </li>
                            <li><a href="{{route('person.create')}}">Kişi Ekle</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                            class="mdi-maps-beenhere"></i> Adresler</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('address.index')}}">Adres Listesi</a>
                            </li>
                            <li><a href="{{route('address.create')}}">Adres Ekle</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

    </ul>
    <a href="#" data-activates="slide-out"
       class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i
            class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->
