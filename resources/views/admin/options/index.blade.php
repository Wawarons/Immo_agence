@extends('admin.admin')

@section('title', 'Les options')

@section('content')


<div class="w-50 mx-auto mt-5">
    <div class="d-flex justify-content-between align-items-center m-5">
        <a  href="{{ route('admin.option.create') }}" class="btn btn-primary rounded-5">Ajouter une option</a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td>
                    <div class="d-flex w-100 justify-content-end">
                        <a class="btn btn-success btn-sm rounded-5 m-2" type="button" data-toggle="tooltip"
                           data-placement="top"
                           title="Edit" href="{{ route('admin.option.edit', $option)}}">Edit</a>

                        <form action="{{ route('admin.option.destroy', $option) }}" method="POST" class="flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-5" data-toggle="tooltip" data-placement="top" value="Supprimer" title="Delete">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
