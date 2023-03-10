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
                <li><a href={{route('cv')}}>Lebenslauf</a></li>
                <li><a href={{route('employments')}}>Berufe</a></li>
                <li><a href={{route('skills')}}>Kenntnisse</a></li>
                <li><a href={{route('projects')}}>Projekte</a></li>
            </ul>
            <a href="#" class="close">Schließen</a>
        </div>
    </nav>

    <!-- Banner -->
    <section id="banner">

        <div class="inner">
            <!-- <div class="logo"><span class="icon fa-gem"></span></div> -->
            <div class="logo">
                <img src="{{ asset('/images/avatar.jpg')}}" alt="" class="rounded-circle" style="width: 20rem; border-radius: 50%"/>
                <!-- <img src="{{ asset('/images/avatar.jpg')}}" alt="" class="image" style="width: 20rem;"/> -->
            </div>
            <h2>Hallo, ich bin {{$profile->name}}</h2>
            <p>{!!$profile->description!!}</p>
        </div>
    </section>

    <!-- Wrapper -->
    <section id="wrapper">

        @foreach($employments as $number => $employment)
            @php
                $number = $number+1;
                $style = $number;
                while ($style > 5) // styles count up to style6
                    {
                        $style = $style - 5;
                    }
            @endphp
            @if($number % 2 == 0)
                <section id="{{$number}}" class="wrapper alt spotlight style{{$style}}">
            @else
                <section id="{{$number}}" class="wrapper spotlight style{{$style}}">
            @endif
                <div class="inner">
                    <a href="{{$employment->url}}" class="image" target="_blank"><img src="data:image/png;base64,{{$employment->image}}" alt="" /></a>
                    <div class="content">
                        <h2 class="major">{{$employment->name}}</h2>
                        <div class="row">
                            @if($number % 2 == 0)
                                <div class="col-6 col-12-medium">
                                    <ul class="alt">
                                        @foreach($employment->short_descriptions as $short_description)
                                            <li>{{$short_description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6 col-12-medium">
                                </div>
                            @else
                                <div class="col-6 col-12-medium">
                                </div>
                                <div class="col-6 col-12-medium">
                                    <ul class="alt">
                                        @foreach($employment->short_descriptions as $short_description)
                                            <li>{{$short_description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <a href="{{route('employments')}}" class="special">mehr erfahren</a>
                    </div>
                </div>
            </section>
        @endforeach

        <!-- Banner -->
        <section id="footer">

            <div class="inner">
                @isset($expertises)
                    <h2 class="major">Skills</h2>
                    <br>
                    <section class="features">
                        @foreach($expertises as $expertise)
                            {{$expertise->name}}
                            <div class="logo" id="myProgress" style="width: 100%; height: 3px; background-color: rgba(255,255,255,0.3)">
                                <div class="skill-bar" style="width: 0%; height: 100%; background-color: white;" data-value="{{$expertise->level}}"></div>
                            </div>
                            <br>
                        @endforeach
                    </section>
                    <ul class="actions">
                        <li><a href="{{route('skills')}}" class="button">Alle ansehen</a></li>
                    </ul>
                @endisset
            </div>
        </section>
        <!-- Four -->
        <section id="four" class="wrapper alt style1">
            <div class="inner">
                <h2 class="major">Projekte</h2>
                <p>Bei meiner professionellen Arbeit handelt es sich in der Regel um proprietären Code, welcher der Geheimhaltung unterliegt. Hier finden sich ausschließlich private Projekte, die uneingeschränkt betrachtet werden können.</p>
                <section class="features">
                    @foreach($projects as $project)
                        <article>
                            <a href="#" class="image"><img src="data:image/png;base64,{{$project->image}}" alt="" /></a>
                            <h3 class="major">{{$project->name}}</h3>
                            @foreach($project->short_descriptions as $short_description)
                                {{$short_description}}
                                <br>
                            @endforeach
                            <br>
                            <a href="{{$project->url}}" class="special" target="_blank">mehr erfahren</a>
                        </article>
                    @endforeach
                </section>
                <ul class="actions">
                    <li><a href="{{route('projects')}}" class="button">Alle ansehen</a></li>
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
<script src={{ asset('/js/helper_guy.js') }}></script>
<script src={{ asset('/js/custom_animation.js') }}></script>

</body>
</html>
