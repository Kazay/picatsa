@extends('layouts.app')

@section('content')
<main class="container auth">
    
    @if ($errors->any())
    <div class="message error">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('thumbnail.store') }}">
        @csrf
        @method('POST')
        <label for="caption">Caption : </label>
        <input type="text" name="caption"/>
        <label for="url">Url : </label>
        <input type="text" name="url"/>
        <label for="description">Description : </label>
        <textarea name="description"></textarea>
        <input type="submit" value="Create">
    </form>
</main>

@endsection

