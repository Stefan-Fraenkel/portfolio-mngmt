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
								<h2>Berufliche Erfahrungen</h2>
								<p>Phasellus non pulvinar erat. Fusce tincidunt nisl eget ipsum.</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">
                                    @isset($employments)
                                        @foreach($employments as $employment)
                                            <section id="one" class="wrapper spotlight style1">
                                                <div class="inner">
                                                    <a href="{{$employment->url}}" class="image" target="_blank"><img src="{{ asset('/images/forsberg_logo_small.jpeg')}}" alt="" /></a>
                                                    <div class="content">
                                                        <h2 class="major">{{$employment->name}}</h2>
                                                        <p>{!!$employment->short_description!!}</p>
                                                        <a href="{{route('employments')}}" class="special"  target="_blank">mehr erfahren</a>
                                                    </div>
                                                </div>
                                            </section>
                                        @endforeach
                                    @endisset
									<h3 class="major">Lorem ipsum dolor</h3>
									<p>Morbi mattis mi consectetur tortor elementum, varius pellentesque velit convallis. Aenean tincidunt lectus auctor mauris maximus, ac scelerisque ipsum tempor. Duis vulputate ex et ex tincidunt, quis lacinia velit aliquet. Duis non efficitur nisi, id malesuada justo. Maecenas sagittis felis ac sagittis semper. Curabitur purus leo donec vel dolor at arcu tincidunt bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ut aliquet justo. Donec id neque ipsum. Integer eget ultricies odio. Nam vel ex a orci fringilla tincidunt. Aliquam eleifend ligula non velit accumsan cursus. Etiam ut gravida sapien.</p>

									<p>Vestibulum ultrices risus velit, sit amet blandit massa auctor sit amet. Sed eu lectus sem. Phasellus in odio at ipsum porttitor mollis id vel diam. Praesent sit amet posuere risus, eu faucibus lectus. Vivamus ex ligula, tempus pulvinar ipsum in, auctor porta quam. Proin nec commodo, vel scelerisque nisi scelerisque. Suspendisse id quam vel tortor tincidunt suscipit. Nullam auctor orci eu dolor consectetur, interdum ullamcorper ante tincidunt. Mauris felis nec felis elementum varius.</p>

									<h3 class="major">Vitae phasellus</h3>
									<p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>

									<section class="features">
										<article>
											<a href="#" class="image"><img src="{{ asset('/images/pic04.jpg')}}" alt="" /></a>
											<h3 class="major">Sed feugiat lorem</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
											<a href="#" class="special">Learn more</a>
										</article>
										<article>
											<a href="#" class="image"><img src="{{ asset('/images/pic05.jpg')}}" alt="" /></a>
											<h3 class="major">Nisl placerat</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id nulla dignissim dapibus ultrices.</p>
											<a href="#" class="special">Learn more</a>
										</article>
									</section>

								</div>
							</div>

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
