<!-- Patient Full REST API -->
<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // GET /api / patients - Get all patients
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    // POST /api / patients - Create a new patient
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        return response()->json($patient, 201);
    }

    // GET /api / patients / {id} - Get a patient by ID
    public function show($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            return response()->json($patient);
        } else {
            return response()->json(["message" => "Patient not found."], 404);
        }
    }

    // PUT /api / patients / {id} - Update a patient by ID
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->update($request->all());
            return response()->json($patient);
        } else {
            return response()->json(["message" => "Patient not found."], 404);
        }
    }

    // DELETE /api / patients / {id} - Delete a patient by ID
    public function destroy($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return response()->json(["message" => "Patient deleted."]);
        } else {
            return response()->json(["message" => "Patient not found."], 404);
        }
    }
}


    