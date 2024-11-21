<?php

namespace App\Http\Controllers;

use App\Models\PatientParent;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PatientBabyController extends Controller
{
    public function showBabyDetails()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the authenticated user is a parent in the `patient_parents` table
        $parent = PatientParent::where('user_id', $user->id)->first();

        if (!$parent) {
            return redirect()->back()->withErrors(['message' => 'You are not registered as a parent.']);
        }

        // Load the parent's children (babies)
        $parentWithChildren = $parent->load('children');

        // Return the Inertia component with the babies' data
        return Inertia::render('BabyDetails', [
            'babies' => $parentWithChildren->children,
        ]);
    }

    public function getBabyDetails()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the authenticated user is a parent in the `patient_parents` table
        $parent = PatientParent::where('user_id', $user->id)->first();

        if (!$parent) {
            return response()->json(['error' => 'You are not registered as a parent.'], 403);
        }

        // Load the parent's children (babies)
        $parentWithChildren = $parent->load('children');

        // Return the babies as a JSON response
        return response()->json(['babies' => $parentWithChildren->children]);
    }
}
