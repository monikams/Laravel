<p>Hello, {{ $data['name'] }}!

You have been registered, but your account hasn't been activated!
If you don't confirm your registration, it will be deleted!

Please click this link to activate your account:</p>

<div><a href="{{ url('/confirm/'.$data["confirmation_code"]) }}" >{{ url('/confirm/'.$data["confirmation_code"]) }}</a></div>


