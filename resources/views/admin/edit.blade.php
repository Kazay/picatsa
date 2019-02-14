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

    <form method="POST" action="{{ route('thumbnail.update', $thumbnail->id) }}">
        @csrf
        @method('PUT')
        <label for="caption">Caption : </label>
        <input type="text" name="caption" value="{{ $thumbnail->caption }}"/>
        <label for="url">Url : </label>
        <input type="text" name="url" value="{{ $thumbnail->url }}"/>
        <label for="description">Description : </label>
        <textarea name="description">{{ $thumbnail->description }}</textarea>
        <label for="visible">Visible ? </label>
        <input type="checkbox" name="visible" id="visible" value="1" @if ($thumbnail->visible) checked @endif>
        <input type="submit" value="Edit">
    </form>
</main>
@endsection

