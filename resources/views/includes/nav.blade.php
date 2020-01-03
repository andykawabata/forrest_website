<header>
    <div class="header-content clearfix">
        <div class="logo"><img src="{{asset('static-img/fj.png')}}"> </div>
        <div id="artist">
            <h1 class="menu-text">Forrest Joss</h1>
            <h4 class="menu-text">Visual Artist</h4>
        </div>
        <nav>
            <ul>
                <li class="sub-menu">
                    <a id="work" href="{{route('default_album', ['album_name' => 'drawings'])}}">WORK</a>
                    <!--<ul sytle="display: none">
                        <li><a href="#">Drawing</a></li>
                        <li><a href="#">Printmaking</a></li>
                        <li><a href="#">Sculpture</a></li>
                    </ul>
                -->
                </li>
                <li><a id="about" href="#">ABOUT</a></li>
                <li><a id="contact" href="#">CONTACT</a></li>
            </ul>
        </nav>
        <div id="menu-toggle"><i class="fa fa-bars fa-2x"></i></div>
    </div>
</header>

