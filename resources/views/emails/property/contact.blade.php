<x-mail::message>
# Nouvelle demande de contact

    Une nouvelle demande de contact de bien à été faite pour le bien <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property ]) }}">{{ $property->title }}</a>.

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Email : {{ $data['email'] }}
- Numéro : {{ $data['phone'] }}

**Message :**<br/>

    {{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
