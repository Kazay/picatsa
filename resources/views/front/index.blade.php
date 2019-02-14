@extends('layouts.app')

@section('content')
<main class="container posts articles">

    @foreach ($thumbnails as $item)
    <article>
        <img src="{{ $item->url }}" alt="{{ $item->caption }}">
        <p><a href="{{ route('show',$item->id) }}">{{ $item->caption }}</a></p>
        <p>{{ $item->description }}</p>
    </article>
    @endforeach
   

</main>
@endsection

