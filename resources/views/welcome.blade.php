@extends('admin.admin')

@section('title', 'Agence immo')

@section('content')

    <h2 class="mx-auto w-fit-content">Welcome</h2>
    <p>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem
        ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem
        ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem
        ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem
        ipsum</p>

    <div class="container d-flex justify-content-between">
        @foreach($properties as $property)
            @include('property.card', $property)
        @endforeach
    </div>

@endsection
