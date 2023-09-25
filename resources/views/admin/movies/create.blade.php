@extends('layouts.app')

@section('page-title', 'All Movies')

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

            <form action="{{ route('admin.movies.store') }}" method="post">
                @csrf

                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" required maxlength="255" value="{{ old('title') }}">
                </div>

                <div>
                    <label for="">Content</label>
                    <textarea name="content" id="" rows="3" required>{{ old('content') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        + Aggiungi
                    </button>                    
                </div>
            </form>
        </div>
    </div>
@endsection