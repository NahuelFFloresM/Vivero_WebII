<header>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="css/imagenes/Logo Very Mëy.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            El Mundo de Very Mëy 
        </a>                   
    </nav>
    <div class="container header ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light header">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="info">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto">Contacto</a>
                    </li>
                    {if isset($logged)}
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                    {else}
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                    {/if}
                </ul>
            </div>
        </nav>
    </div>
</header>