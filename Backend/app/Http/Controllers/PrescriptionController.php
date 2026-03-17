<!-- Prescription Full REST API -->
<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // GET /api / prescriptions - Get all prescriptions
    public function index()
    {
        $prescriptions = Prescription::all();
        return response()->json($prescriptions);
    }

    // POST /api / prescriptions - Create a new prescription
    public function store(Request $request)
    {
        $prescription = Prescription::create($request->all());
        return response()->json($prescription, 201);
    }

    // GET /api / prescriptions / {id} - Get a prescription by ID
    public function show($id)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            return response()->json($prescription);
        } else {
            return response()->json(["message" => "Prescription not found."], 404);
        }
    }

    // PUT /api / prescriptions / {id} - Update a prescription by ID
    public function update(Request $request, $id)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            $prescription->update($request->all());
            return response()->json($prescription);
        } else {
            return response()->json(["message" => "Prescription not found."], 404);
        }
    }

    // DELETE /api / prescriptions / {id} - Delete a prescription by ID
    public function destroy($id)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            $prescription->delete();
            return response()->json(["message" => "Prescription deleted."]);
        } else {
            return response()->json(["message" => "Prescription not found."], 404);
        }
    }
}

