<?php

namespace App\Http\Controllers;

use App\Models\PatientParent;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function getBabyDetails()
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
        return Inertia::render('Calendar', [
            'babies' => $parentWithChildren->children,
        ]);
    }
}
