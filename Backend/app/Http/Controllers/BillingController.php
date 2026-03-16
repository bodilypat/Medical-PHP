<!-- app/Http/Controllers/BillingController.php
 billing fields
 bill_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    appointment_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_status ENUM('Pending','Paid') DEFAULT 'Pending',
    payment_method ENUM('Cash','Card','Insurance') DEFAULT 'Cash',
    billing_date DATE,
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE,
    FOREIGN KEY (appointment_id) REFERENCES appointments(appointment_id) ON DELETE CASCADE
 -->
<?php

namespace App\Http\Controllers;
use App\Models\Billing;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    // Display a listing of the bills
    public function index()
    {
        $bills = Billing::with(['patient', 'appointment'])->get();
        return view('bills.index', compact('bills'));
    }

    // Show the form for creating a new bill
    public function create()
    {
        $patients = Patient::all();
        $appointments = Appointment::all();
        return view('bills.create', compact('patients', 'appointments'));
    }

    // Store a newly created bill in storage
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:Pending,Paid',
            'payment_method' => 'required|in:Cash,Card,Insurance',
            'billing_date' => 'nullable|date',
        ]);
        Billing::create($request->all());
        return redirect()->route('bills.index')->with('success', 'Bill created successfully.');
    }

    // Display the specified bill
    public function show(Billing $bill)
    {
        $bill->load(['patient', 'appointment']);
        return view('bills.show', compact('bill'));
    }
}

