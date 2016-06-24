<p>Congratulations, {{ $data['name'] }}
You have been succesfully registered!

Please click this link to activate your account:
</p>
<div><a href="{{ url('/confirm/'.$data["confirmation_code"]) }}" >{{ url('/confirm/'.$data["confirmation_code"]) }}</a></div>


