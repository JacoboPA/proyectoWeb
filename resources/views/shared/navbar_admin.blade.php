<?php
use Illuminate\Support\Facades\Auth;
?>

<nav class="col-md-8 col-md-push-2 navbar navbar-default" id="barra">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="glyphicon glyphicon-circle-arrow-left" href="/"></a>
            <a class="navbar-brand" href="/inicio" id="logo"><img
                        src="http://invisioncommunity.co.uk/wp-content/uploads/2016/11/mordheim_logo.png" width="180px"></a>
        </div>
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">Inicio</a></li>
                <li><a href="/about">Historia</a></li>
                <li><a href="/Razas">Razas</a></li>
                <li><a href="/Clases">Clases</a></li>
                <li><a href="/personajes/admin">Personajes</a></li>
                <li><a href="/usuarios">Usuarios</a></li>
                <li><a href="/partidas">Partidas</a></li>
                <?php $user = Auth::user();?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button">
                        admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <!--Modal-->

    </div>
</nav>
