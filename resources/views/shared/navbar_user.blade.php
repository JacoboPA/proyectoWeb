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

            <a href="/inicio"><img
                        src="/imagenes/mordheim_logo.png" width="180px"></a>
        </div>
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/historia">Historia</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Razas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Enanos">Enanos</a>
                        </li>
                        <li>
                            <a href="/Elfos">Elfos</a>
                        </li>
                        <li>
                            <a href="/Humanos">Humanos</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Clases<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Guerrero">Guerrero</a>
                        </li>
                        <li>
                            <a href="/Picaro">Picaro</a>
                        </li>
                        <li>
                            <a href="/Mago">Mago</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Personajes<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="/contact">Creacion de personajes</a></li>

                        <li><a href="/personajes">Personajes</a></li>

                    </ul>
                </li>
                <?php $user = Auth::user();?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button">
                        <?php echo $user->name; ?>
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
                        <li>
                            <a href="/settings">Configuración cuenta</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <!--Modal-->

    </div>
</nav>
