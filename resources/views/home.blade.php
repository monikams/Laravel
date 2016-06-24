@extends('app')

@section('content')
<!--<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="#"> My site</a>
  </div>
  <ul class="nav navbar-nav">
    <li><a href="auth/register">Register</a></li>
    <li><a href="auth/login">Log in</a></li>
    <li><a href="auth/logout">Log out</a></li>
  </ul>
</div>
</nav>-->
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
