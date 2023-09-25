@extends('layouts.app')

@section('page-title', 'Modifica' .$movie->title)

@section('main-content')
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.movies.update' , ['movie' , => $movie->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title' , $movie->title) }}">
                </div>

                <div>
                    <label for="">Content</label>
                    <textarea name="content" id="" rows="3" required>{{ old('content' , $movie->content) }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        Aggiorna
                    </button>                    
                </div>
            </form>
        </div>
    </div>
@endsection