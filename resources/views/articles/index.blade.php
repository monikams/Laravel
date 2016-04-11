@extends('app1')


@section('content')
<h1> Articles </h2>

@foreach($articles as $article)
    <article> 
        <h2>
            <a href="/articles/{{ $article->id }}"> {{ $article->title }} </a>
        </h2>
        
        <div class="body"> {{ $article->body }} </div>
    </article>
@endforeach

@stop
