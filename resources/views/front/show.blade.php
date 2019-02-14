@extends('layouts.app')

@section('content')
<main class="container posts article">

    <article>
        <img src="{{ $thumbnail->url }}" alt="{{ $thumbnail->caption }}">
        <div class="infos"> {{ $thumbnail->caption }}
       </div>
       
        <p>{{ $thumbnail->description }}</p>
    </article>
    
</main>
@endsection
