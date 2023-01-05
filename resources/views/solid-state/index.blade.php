<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>{{$profile->name}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href={{ asset('/css/main.css') }}/>
    <noscript><link rel="stylesheet" href={{ asset('/css/noscript.css') }} /></noscript>
</head>
<body class="is-preload">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="{{route('home')}}">{{$profile->name}}</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li><a href={{route('home')}}>Startseite</a></li>
                <li><a href={{route('generic')}}>Unterseite</a></li>
                <li><a href={{route('elements')}}>Elemente</a></li>
                <li><a href={{route('portfolio')}}>Lebenslauf</a></li>
                <li><a href={{route('update_portfolio')}}>Lebenslauf aktualisieren</a></li>
            </ul>
            <a href="#" class="close">Schließen</a>
        </div>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <div class="logo">
                <img src="{{ asset('/images/avatar.jpg')}}" alt="" class="image" style="width: 20rem;"/>
            </div>
            <h2>Hallo, ich bin {{$profile->name}}</h2>
            <p>{{$profile->description}}</p>
        </div>
    </section>

    <!-- Wrapper -->
    <section id="wrapper">

        <!-- One -->
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">
                <a href="#" class="image"><img src="{{ asset('/images/pic01.jpg')}}" alt="" /></a>
                <div class="content">
                    <h2 class="major">Magna arcu feugiat</h2>
                    <p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
                    <a href="#" class="special">mehr erfahren</a>
                </div>
            </div>
        </section>

        <!-- Two -->
        <section id="two" class="wrapper alt spotlight style2">
            <div class="inner">
                <a href="#" class="image"><img src={{ asset('/images/pic02.jpg') }} alt="" /></a>
                <div class="content">
                    <h2 class="major">Tempus adipiscing</h2>
                    <p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
                    <a href="#" class="special">mehr erfahren</a>
                </div>
            </div>
        </section>

        <!-- Three -->
        <section id="three" class="wrapper spotlight style3">
            <div class="inner">
                <a href="#" class="image"><img src={{ asset('/images/pic03.jpg') }} alt="" /></a>
                <div class="content">
                    <h2 class="major">Nullam dignissim</h2>
                    <p>Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.</p>
                    <a href="#" class="special">mehr erfahren</a>
                </div>
            </div>
        </section>

        <!-- Four -->
        <section id="four" class="wrapper alt style1">
            <div class="inner">
                <h2 class="major">Vitae phasellus</h2>
                <p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
                <section class="features">
                    <article>
                        <a href="#" class="image"><img src={{ asset('/images/pic04.jpg') }} alt="" /></a>
                        <h3 class="major">Sed feugiat lorem</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
                        <a href="#" class="special">mehr erfahren</a>
                    </article>
                    <article>
                        <a href="#" class="image"><img src={{ asset('/images/pic05.jpg') }} alt="" /></a>
                        <h3 class="major">Nisl placerat</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
                        <a href="#" class="special">mehr erfahren</a>
                    </article>
                    <article>
                        <a href="#" class="image"><img src={{ asset('/images/pic06.jpg') }} alt="" /></a>
                        <h3 class="major">Ante fermentum</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
                        <a href="#" class="special">mehr erfahren</a>
                    </article>
                    <article>
                        <a href="#" class="image"><img src={{ asset('/images/pic07.jpg') }} alt="" /></a>
                        <h3 class="major">Fusce consequat</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
                        <a href="#" class="special">mehr erfahren</a>
                    </article>
                </section>
                <ul class="actions">
                    <li><a href="#" class="button">Alle ansehen</a></li>
                </ul>
            </div>
        </section>

    </section>

    <!-- Footer -->
    <section id="footer">
        <div class="inner">
            <h2 class="major">Kontakt aufnehmen</h2>
            <p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
            <form method="post" action="{{route("send_mail")}}">
                @csrf
                <div class="fields">
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required />
                    </div>
                    <div class="field">
                        <label for="message">Nachricht</label>
                        <textarea name="message" id="message" rows="4"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="abschicken" /></li>
                </ul>
            </form>
            <ul class="contact">
                <li class="icon solid fa-home">
                    {{$profile->name}}<br />
                    {{$profile->street}}<br />
                    {{$profile->zip_code}} {{$profile->city}}
                </li>
                <li class="icon solid fa-envelope"><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></li>
                <li class="icon brands fa-github"><a href="{{$profile->github}}" target="_blank">{{explode('https://', $profile->github)[1]}}</a></li>
                <li class="icon brands fa-linkedin"><a href="{{$profile->linkedin}}" target="_blank">{{explode('https://www.linkedin.com/', $profile->linkedin)[1]}}</a></li>
                <li class="icon brands fa-xing"><a href="{{$profile->xing}}" target="_blank">{{explode('https://www.xing.com/', $profile->xing)[1]}}</a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; {{$profile->name}} &nbsp All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

</div>

<!-- Scripts -->
<script src={{ asset('/js/jquery.min.js') }}></script>
<script src={{ asset('/js/jquery.scrollex.min.js') }}></script>
<script src={{ asset('/js/browser.min.js') }}></script>
<script src={{ asset('/js/breakpoints.min.js') }}></script>
<script src={{ asset('/js/util.js') }}></script>
<script src={{ asset('/js/main.js') }}></script>

</body>
</html>
