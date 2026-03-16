<!-- app/Http/Controllers/PrescriptionController.php 
Prescription fields :
    prescription_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    medication_name VARCHAR(255) NOT NULL,
    dosage VARCHAR(100) NOT NULL,
    frequency VARCHAR(100) NOT NULL,
    duration VARCHAR(100) NOT NULL,
    instructions TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE
 -->

<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Display a listing of the prescriptions
    public function index()
    {
        $prescriptions = Prescription::with(['patient', 'doctor'])->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    // Show the form for creating a new prescription
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('prescriptions.create', compact('patients', 'doctors'));
    }

    // Store a newly created prescription in storage
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'instructions' => 'nullable|string',
        ]);
        Prescription::create($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    // Display the specified prescription
    public function show(Prescription $prescription)
    {
        $prescription->load(['patient', 'doctor']);
        return view('prescriptions.show', compact('prescription'));
    }

    // Show the form for editing the specified prescription
    public function edit(Prescription $prescription)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('prescriptions.edit', compact('prescription', 'patients', 'doctors'));
    }

    // Update the specified prescription in storage
    public function update(Request $request, Prescription $prescription)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'instructions' => 'nullable|string',
        ]);
        $prescription->update($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    // Remove the specified prescription from storage
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }
}



