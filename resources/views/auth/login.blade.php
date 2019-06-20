<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title>Inusual Software -  Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="logmod">
        <div class="logmod__wrapper">
            <span class="logmod__close">Close</span>
            <div class="logmod__container">
                <ul class="logmod__tabs">
                    <li data-tabtar="lgm-2"><a href="#">Acceder</a></li>
                    <li data-tabtar="lgm-1"><a href="#">Inusual Software</a></li>
                </ul>
                <div class="logmod__tab-wrapper">
                    <div class="logmod__tab lgm-1">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Inusual Software Industries 2019</span>
                        </div>
                        <div class="logmod__form">
                            
                        </div>
                        
                    </div>
                    <div class="logmod__tab lgm-2">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Ingresa tu Correo y contraseña<strong> Para accesar</strong></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="logmod__form">
                            <form method="POST" action="{{ route('login') }}" class="simform">
                                @csrf
                                <div class="sminputs">
                                    <div class="input full">
                                        
                                        <label class="string optional" for="user-name">Correo*</label>
                                        <input class="string optional" name="email" maxlength="255" id="user-email"
                                            placeholder="Email" type="email" size="50" />
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" for="user-pw">Contraseña*</label>
                                        <input class="string optional" maxlength="255" id="user-pw"
                                            placeholder="Password" name="password" type="password" size="50" />
                                        <span class="hide-password">Mostrar</span>
                                    </div>
                                </div>
                                <div class="simform__actions">
                                    <button class="sumbit" type="submit">Acceder</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script src="login.js"></script>
</body>

</html>