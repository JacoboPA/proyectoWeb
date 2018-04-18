<nav class="navbar navbar-default  col-md-8 col-md-push-2" id="barra">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" id="logo"><img
                        src="/imagenes/mordheim_logo.png" width="180px" >
            </a>
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
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button"
                       aria-expanded="false"> Miembros
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/register" class="dropdown-item">No tengo cuenta</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal" class="dropdown-item">Login</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--Modal-->


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="container ">


                    <div class="row">
                        <div class="col-md-4 col-md-pull-1 ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="panel-heading panel-info">PJ</div>
                                </div>
                                <!--<div class="panel-heading panel-info">usuario</div>-->

                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4">Correo</label>

                                            <div class="col-md-4">
                                                <input id="email" type="email" name="email" class="form-control"
                                                       value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4">Contraseña</label>

                                            <div class="col-md-4">
                                                <input id="password" type="password" class="form-control"
                                                       name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                                @endif
                                            </div>
                                        </div>

                                        <!--boton recordar-->
                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"
                                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        recordar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--botones entrar y reset password-->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-md-push-3">
                                                    <button type="submit" class="btn btn-warning">Entrar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-push-2">
                                                    <a class="btn btn-link">Olvidaste
                                                        tu contraseña?</a>
                                                </div>
                                            </div>
                                        <!--href="{{ route('password.request') }}-->

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</nav>



