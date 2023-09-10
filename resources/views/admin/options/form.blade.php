@extends('admin.admin')

@section('title', $option->exists ? 'Edit': 'Create')

@section('content')

    <form class="form-group w-50 d-flex justify-content-between flex-column"
          action="{{ route( $option->exists ? 'admin.option.update':'admin.option.store', $option) }}" method="post">
        @csrf
        @method($option->exists ? 'PUT':'POST')
        @include('shared.input', ['name' => 'name', 'label' => 'Nom', 'value' => $option->name])
        <div>
            <button class="btn btn-primary">
                @if($option->exists)
                    Edit
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
