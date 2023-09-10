<div class="card rounded-2 mx-1">
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property'=>$property]) }}">{{$property->title}}</a></h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$property->surface}} m², {{ $property->city }} {{ $property->postal_code }}</h6>
        <p class="card-subtitle mb-2 text-primary fw-bold" style="font-size: 1.2rem">{{ number_format($property->price, thousands_separator: ' ') }} €</p>
    </div>
</div>
