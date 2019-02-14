@extends('layouts.app')

@section('content')
<main class="container posts articles">
    @if ($message = Session::get('success'))
    <div id='alert' class="message status">
        <button type="button" class="close" data-dismiss="alert" onclick="closeAlert();">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div id='alert' class="message error">
        <button type="button" class="close" data-dismiss="alert" onclick="closeAlert();">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <article>
        <p> <a href="{{ route('thumbnail.create') }}">New thumbnail</a></p>
    </article>
    @foreach ($thumbnails as $item)
    <article>
        <img src="{{ $item->url }}" alt="{{ $item->caption }}">
        <p><a href="{{ route('show',$item->id) }}">{{ $item->caption }}</a></p>
        <p>{{ $item->description }}</p>
        <p>
            <a href=""onclick="event.preventDefault();document.getElementById('edit-form[{{$item->id}}]').submit();">Edit</a>
        </p>
        <form id="edit-form[{{$item->id}}]" action="{{ route('thumbnail.edit', ['id' => $item->id]) }}" method="POST" style="display: none;">
            @csrf
            @method('GET')
        </form>
        <p>
            <a href=""onclick="event.preventDefault();document.getElementById('delete-form[{{$item->id}}]').submit();">Delete</a>
        </p>
        <form id="delete-form[{{$item->id}}]" action="{{ route('thumbnail.destroy', ['id' => $item->id]) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </article>
    @endforeach
   
</main>

<script>
function closeAlert()
{
   document.getElementById('alert').style.display = 'none';
}
</script>

@endsection
