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

        return redirect()->route('pre-registration.success')
            ->with('success', 'Votre pré-inscription a été enregistrée avec succès !');
    }

    public function status()
    {
        return Inertia::render('PreRegistration/Status');
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $preRegistration = PreRegistration::with('formation')
            ->where('email', $validated['email'])
            ->where('phone', $validated['phone'])
            ->first();

        if (!$preRegistration) {
            return back()->withErrors(['email' => 'Aucune pré-inscription trouvée avec ces informations.']);
        }

        return Inertia::render('PreRegistration/View', [
            'preRegistration' => $preRegistration,
            'formations' => Formation::select('id', 'titre')->get()
        ]);
    }
    
    public function update(Request $request, PreRegistration $preRegistration)
    {
        // Simple vérification de sécurité
        if ($request->email !== $preRegistration->email) {
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
