<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('asset/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('indexApps')}}">
                                <i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('archivos.index')}}">
                            <i class="fas fa-list-ol"></i>  Ver versiones</a>
                        </li>

                        <li>
                            <a href="{{ route('formApps')}}">
                                <i class="fas fa-edit"></i>Agregar aplicaciones</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->