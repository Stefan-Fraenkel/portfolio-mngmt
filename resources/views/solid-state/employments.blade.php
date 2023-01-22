<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
        <title>{{$profile->name}} - Berufe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href={{ asset('/css/main.css') }}/>
        <noscript><link rel="stylesheet" href={{ asset('/css/noscript.css') }} /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
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

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>Berufliche Erfahrung</h2>
								<p>Meine bisherigen Tätigkeiten.</p>
							</div>
						</header>

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
                                        <h2 class="major">
                                            {{$employment->name}}
                                        </h2>
                                        @if($number % 2 == 0)
                                            <div class="row" style="float: right">
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->employer}}</h4>
                                                </div>
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->location}}</h4>
                                                </div>
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->from}} - {{$employment->to}}</h4>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row" style="float: left">
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->employer}}</h4>
                                                </div>
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->location}}</h4>
                                                </div>
                                                <div class="col-4-medium col-12-small">
                                                    <h4>{{$employment->from}} - {{$employment->to}}</h4>
                                                </div>
                                            </div>
                                        @endif
                                        <br><br>
                                        <div class="row">
                                            @if($number % 2 == 0)
                                                <div class="col-6 col-12-medium">
                                                </div>
                                                <div class="col-6 col-12-medium">
                                                    <h4>Aufgaben</h4>
                                                    <ul class="alt">
                                                        @foreach($employment->short_descriptions as $short_description)
                                                            <li>{{$short_description}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="col-6 col-12-medium">
                                                    <h4>Aufgaben</h4>
                                                    <ul class="alt">
                                                        @foreach($employment->short_descriptions as $short_description)
                                                            <li>{{$short_description}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-6 col-12-medium">
                                                </div>
                                            @endif
                                        </div>
                                        <a href="{{route('employments')}}" class="special"  target="_blank">mehr erfahren</a>
                                    </div>
                                </div>
                            </section>
                        @endforeach
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
