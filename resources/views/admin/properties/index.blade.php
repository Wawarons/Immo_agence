@extends('admin.admin')

@section('title', 'Tout les biens')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{ $property->title }}</td>
                <td>{{ $property->surface }}m²</td>
                <td>{{ number_format($property->price, thousands_separator: ' ') }} €</td>
                <td>{{ $property->city }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a class="btn btn-success btn-sm rounded-5 m-2" type="button" data-toggle="tooltip"
                           data-placement="top"
                           title="Edit" href="{{ route('admin.property.edit', $property) }}">Edit</a>

                        @can('delete', $property)
                    <form action="{{ route('admin.property.destroy', $property) }}" method="POST" class="flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-5 m-2" data-toggle="tooltip"
                           data-placement="top"
                               value="Supprimer"
                                title="Delete">Supprimer</button>
                    </form>
                            @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}

@endsection
