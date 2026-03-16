<!-- app/Http/Controllers/DoctorController.php -->
<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Display a listing of the doctors
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    // Show the form for creating a new doctor
    public function create()
    {
        return view('doctors.create');
    }

    // Store a newly created doctor in storage
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'specialization' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'consultation_fee' => 'nullable|numeric',
        ]);
        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }
    // Display the specified doctor
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }
    // Show the form for editing the specified doctor
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    // Update the specified doctor in storage
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'specialization' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'consultation_fee' => 'nullable|numeric',
        ]);
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    // Remove the specified doctor from storage
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}


