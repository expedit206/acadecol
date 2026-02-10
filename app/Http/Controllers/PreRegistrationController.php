<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\Formation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PreRegistrationController extends Controller
{
    public function create()
    {
        return Inertia::render('PreRegistration/Create', [
            'formations' => Formation::select('id', 'titre')->get()
        ]);
    }

    public function store(Request $request)
    {
        // Vérification préalable
        $existing = PreRegistration::where('email', $request->email)->first();
        if ($existing) {
            return back()->with('warning', 'Une pré-inscription existe déjà avec cet email.');
        }

        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:M,F',
            'education_level' => 'required|string',
            'last_school' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $validated['registration_number'] = 'PRE-' . strtoupper(Str::random(8));
        $validated['status'] = 'pending';

        $preRegistration = PreRegistration::create($validated);

        // Connexion automatique "session étudiante"
        session(['student_id' => $preRegistration->id]);

        return redirect()->route('pre-registration.show')
            ->with('success', 'Votre pré-inscription a été enregistrée avec succès !');
    }

    public function loginForm()
    {
        return Inertia::render('PreRegistration/Login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string',
        ]);

        $preRegistration = PreRegistration::where('phone', $validated['phone'])
            ->latest()
            ->first();

        if (!$preRegistration) {
            return back()->withErrors(['phone' => 'Aucune pré-inscription trouvée avec ce numéro.']);
        }

        session(['student_id' => $preRegistration->id]);

        return redirect()->route('pre-registration.show');
    }

    public function show()
    {
        if (!session()->has('student_id')) {
            return redirect()->route('pre-registration.login');
        }

        $preRegistration = PreRegistration::with('formation')->find(session('student_id'));

        if (!$preRegistration) {
            session()->forget('student_id');
            return redirect()->route('pre-registration.login');
        }

        return Inertia::render('PreRegistration/View', [
            'preRegistration' => $preRegistration,
            'formations' => Formation::select('id', 'titre')->get()
        ]);
    }
    
    public function update(Request $request, PreRegistration $preRegistration)
    {
        // Sécurité basée sur la session
        if (session('student_id') !== $preRegistration->id) {
            abort(403);
        }

        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:M,F',
            'education_level' => 'required|string',
            'last_school' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $preRegistration->update($validated);

        return back()->with('success', 'Vos informations ont été mises à jour.');
    }
}
