@extends('layouts.app')

@section('page-title', 'All Categories')

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
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">
                                {{ $category->id }}
                            </th>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                {{ $category->slug }}
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.show' , ['categories' => $category->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('admin.categories.show' , ['categories' => $category->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>

                                <form action="{{ route('admin.categories.destroy' , ['categories' => $category->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare?')">
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