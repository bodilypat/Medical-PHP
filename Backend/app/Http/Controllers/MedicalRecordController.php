<!-- 
 medical_record_id INT AUTO_INCREMENT PRIMARY KEY,
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL  ,
    diagnosis TEXT,
    treatment TEXT,
    prescription TEXT,
    notes TEXT,
    visit_date DATE,
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE
 -->
<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // Display a listing of the medical records
    public function index()
    {
        $medicalRecords = MedicalRecord::with(['patient', 'doctor'])->get();
        return view('medical_records.index', compact('medicalRecords'));
    }

    // Show the form for creating a new medical record
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('medical_records.create', compact('patients', 'doctors'));
    }

    // Store a newly created medical record in storage
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'prescription' => 'nullable|string',
            'notes' => 'nullable|string',
            'visit_date' => 'nullable|date',
        ]);
        MedicalRecord::create($request->all());
        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    // Display the specified medical record
    public function show(MedicalRecord $medicalRecord)
    {
        $medicalRecord->load(['patient', 'doctor']);
        return view('medical_records.show', compact('medicalRecord'));
    }

    // Show the form for editing the specified medical record
    public function edit(MedicalRecord $medicalRecord)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('medical_records.edit', compact('medicalRecord', 'patients', 'doctors'));
    }

    // Update the specified medical record in storage
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'prescription' => 'nullable|string',
            'notes' => 'nullable|string',
            'visit_date' => 'nullable|date',
        ]);
        $medicalRecord->update($request->all());
        return redirect
            ->route('medical_records.index')
            ->with('success', 'Medical record updated successfully.');
    }

    // Remove the specified medical record from storage
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medical_records.index')->with('success', 'Medical record deleted successfully.');
    }   
}

