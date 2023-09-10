<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Jobs\DemoJob;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Property $property)
    {

        DemoJob::dispatch($property)->delay(now()->addSeconds(10));
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', ['slug' => $slug, 'property' => $property]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        /**
         * @var User $user
         */
        $user = User::first();
        Notification::route('mail', 'john@doe.fr')->notify(new ContactRequestNotification($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact à bien été envoyé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
