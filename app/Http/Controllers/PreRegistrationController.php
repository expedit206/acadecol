<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\Formation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PreRegistrationController extends Controller
{
    public function create(Request $request)
    {
        // Si déjà connecté (session ou cookie), rediriger vers show
        if ($request->session()->has('student_id')) {
            return redirect()->route('pre-registration.show');
        }
        
        $cookieValue = \Illuminate\Support\Facades\Cookie::get('student_access');
        if ($cookieValue) {
            try {
                $studentId = \Illuminate\Support\Facades\Crypt::decryptString($cookieValue);
                if (PreRegistration::find($studentId)) {
                    session(['student_id' => $studentId]);
                    return redirect()->route('pre-registration.show');
                }
            } catch (\Exception $e) {
                // Cookie invalide
            }
        }

        return Inertia::render('PreRegistration/Create', [
            'formations' => Formation::select('id', 'titre')->get()
        ]);
    }
    
    public function logout(Request $request) {
        $request->session()->forget('student_id');
        return redirect()->route('pre-registration.create')->withCookie(\Illuminate\Support\Facades\Cookie::forget('student_access'));
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
            'whatsapp' => 'nullable|string|max:20',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'education_level' => 'required|string',
            'last_school' => 'nullable|string',
            'graduation_year' => 'nullable|string|max:4',
            'major_field' => 'nullable|string',
            'professional_status' => 'nullable|string',
            'current_position' => 'nullable|string',
            'company_name' => 'nullable|string',
            'years_of_experience' => 'nullable|string',
            'french_level' => 'nullable|string',
            'english_level' => 'nullable|string',
            'other_languages' => 'nullable|string',
            'availability' => 'nullable|string',
            'preferred_schedule' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $validated['registration_number'] = 'PRE-' . strtoupper(Str::random(8));
        $validated['status'] = 'pending';

        $preRegistration = PreRegistration::create($validated);

        // Connexion session + Cookie persistant (30 jours)
        session(['student_id' => $preRegistration->id]);
        $cookie = cookie('student_access', \Illuminate\Support\Facades\Crypt::encryptString($preRegistration->id), 60 * 24 * 30);

        return redirect()->route('pre-registration.show')
            ->with('success', 'Votre pré-inscription a été enregistrée avec succès !')
            ->withCookie($cookie);
    }

    public function loginForm()
    {
        // Si déjà connecté
        if (session()->has('student_id')) {
            return redirect()->route('pre-registration.show');
        }
        // ... (check cookie logic si je veux, mais create le fait aussi)
        
        return redirect()->route('pre-registration.create');
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
        $cookie = cookie('student_access', \Illuminate\Support\Facades\Crypt::encryptString($preRegistration->id), 60 * 24 * 30);

        return redirect()->route('pre-registration.show')->withCookie($cookie);
    }

    public function show()
    {
        // Tentative de récupération depuis cookie si session vide
        if (!session()->has('student_id')) {
            $cookieValue = \Illuminate\Support\Facades\Cookie::get('student_access');
            if ($cookieValue) {
                try {
                    $studentId = \Illuminate\Support\Facades\Crypt::decryptString($cookieValue);
                    session(['student_id' => $studentId]);
                } catch (\Exception $e) {
                     return redirect()->route('pre-registration.login');
                }
            } else {
                return redirect()->route('pre-registration.login');
            }
        }

        $preRegistration = PreRegistration::with('formation')->find(session('student_id'));

        if (!$preRegistration) {
            session()->forget('student_id');
            return redirect()->route('pre-registration.login')->withCookie(cookie()->forget('student_access'));
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
            'gender' => 'required|in:M,F',
            'message' => 'nullable|string',
        ]);

        $preRegistration->update($validated);

        return back()->with('success', 'Vos informations ont été mises à jour.');
    }
}
