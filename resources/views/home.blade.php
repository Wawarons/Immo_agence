@extends('base')

@section('title', 'Home')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Immo</h1>
            <p>Dicatvelit aeque atomorum dolorum dico necessitatibus eum eruditi. Erroribusaperiri mollis disputationi
                ludus mauris quo constituam. Disputationipharetra cum posse finibus ridens nunc deseruisse sodales
                persius fastidii sapientem posse. Tristiquealienum sonet ac appetere eros sonet omittam convallis
                graecis quidam corrumpit non torquent vel invenire honestatis.
</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos dernier biens</h2>
    <div class="row">
        @foreach($properties as $property)
        <div class="col">
            @include('property.card')
        </div>
        @endforeach
    </div>
    </div>

@endsection

