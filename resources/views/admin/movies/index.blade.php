@extends('layouts.app')

@section('page-title', 'All Movies')

@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <th scope="row">
                                {{ $movie->id }}
                            </th>
                            <td>
                                {{ $movie->title }}
                            </td>
                            <td>
                                {{ $movie->slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.movies.show' , ['movies' => $movie->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.movies.show' , ['movies' => $movie->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>

                                <form action="{{ route('admin.movies.destroy' , ['movies' => $movie->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection