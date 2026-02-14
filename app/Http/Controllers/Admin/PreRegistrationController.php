<?php

namespace App\Http\Controllers\Admin;

use App\Models\PreRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PreRegistrationController extends Controller
{
    public function index()
    {
        $preRegistrations = PreRegistration::with('formation')
            ->latest()
            ->paginate(10);

         return Inertia::render('Admin/PreRegistrations/Index', [
            'preRegistrations' => $preRegistrations
        ]);
    }

    public function show(PreRegistration $preRegistration)
    {
        $preRegistration->load('formation');
        return Inertia::render('Admin/PreRegistrations/Show', [
            'preRegistration' => $preRegistration
        ]);
    }

    public function update(Request $request, PreRegistration $preRegistration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,validated,cancelled',
        ]);

        $preRegistration->update($validated);

        return back()->with('success', 'Statut mis à jour.');
    }
}
