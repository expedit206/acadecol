<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Formation;
use App\Models\PreRegistration;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'formations' => Formation::all()->map(function ($f) {
                return [
                    'id' => $f->id,
                    'titre' => $f->titre['fr'] ?? $f->titre,
                ];
            }),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'formation_id' => 'required|exists:formations,id',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:M,F',
            'education_level' => 'required|string|max:255',
            'last_school' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $preRegistration = PreRegistration::create([
            'user_id' => $user->id,
            'formation_id' => $request->formation_id,
            'registration_number' => 'PRE-' . strtoupper(Str::random(8)),
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'education_level' => $request->education_level,
            'last_school' => $request->last_school,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('pre-registration.success');
    }

    public function success(): Response
    {
        $user = Auth::user();
        $preRegistration = PreRegistration::where('user_id', $user->id)
            ->with(['formation', 'user'])
            ->firstOrFail();

        return Inertia::render('Auth/PreRegistrationSuccess', [
            'preRegistration' => $preRegistration,
        ]);
    }
}

