<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ahmad School</title>
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/school.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href={{ asset('assets/css/all.min.css') }}>
	<!-- bootstrap -->
	<link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.min.css') }}>

</head>

<body class="bg-light">
	@if(auth()->user())

		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3f99db;">
			@if (auth()->user()->role == 'admin')
			<a class="navbar-brand" href="{{ route('admin.dashborad') }}">Dashboard</a>
			@else
			<a class="navbar-brand" href="/employee/dashborad">Dashboard</a>
			@endif
				
			<div class="container">



				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">

					<ul class="navbar-nav mr-auto">
						@if (auth()->user()->role == 'admin')
							<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('admin.showEmployee') }}">Employees</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('admin.classroom') }}">Classroom</a>
						</li>
						@endif
					
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('show.student') }}">Students</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('show.subject') }}">Subjects</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('show.grade') }}">Grades</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('show.attendance') }}">Attendance</a>
						</li>
					</ul>

					@auth
						<ul class="navbar-nav">
							<li class="nav-item dropdown">

								<a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">
									{{ auth()->user()->username }}
								</a>

								<div class="dropdown-menu dropdown-menu-right">

									<form action="{{ route('Admin.logout') }}" method="POST">
										@csrf
										<button class="dropdown-item" type="submit">
											Logout
										</button>
									</form>

								</div>

							</li>
						</ul>
					@endauth

				</div>

			</div>
		</nav>

	@endif
	@yield('content')

	<!-- jquery -->
	<script src={{ asset('assets/js/jquery-1.11.3.min.js') }}></script>
	<!-- bootstrap -->
	<script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>
	<!-- count down -->
	<script src={{ asset('assets/js/jquery.countdown.js') }}></script>
	<!-- mean menu -->
	<script src={{ asset('assets/js/jquery.meanmenu.min.js') }}></script>
</body>

</html>