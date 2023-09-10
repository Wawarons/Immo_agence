@extends('admin.admin')

@section('title', $property->exists ? "Editer un biens" : "Créer un biens")

@section('content')

    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update':'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'PUT':'POST')

        <div class="row">
            @include('shared.input', ['class'=> 'col', 'name' => 'title', 'value' => $property->title])
            <div class="col row">
                @include('shared.input', ['class'=> 'col', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class'=> 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>
        @include('shared.input', ['type'=>'textarea', 'class'=> 'col', 'name' => 'description', 'value' => $property->description])
        <div class="col row">
            @include('shared.input', ['class'=> 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class'=> 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class'=> 'col', 'label'=>'floor', 'name' => 'floor', 'value' => $property->floor])
        </div>
        <div class="col row">
            @include('shared.input', ['class'=> 'col', 'label'=> 'adresse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['class'=> 'col', 'label'=>'code postale', 'name' => 'postal_code', 'value' => $property->postal_code])
            @include('shared.input', ['class'=> 'col', 'label'=>'ville','name' => 'city', 'value' => $property->city])
        </div>
        @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true])


        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])
        <div>
            <button class="btn btn-primary">
                @if($property->exists)
                    Edit
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
