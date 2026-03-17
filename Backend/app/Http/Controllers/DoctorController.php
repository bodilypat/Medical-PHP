<!-- Doctor Full REST API -->
<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // GET /api / doctors - Get all doctors
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    // POST /api / doctors - Create a new doctor
    public function store(Request $request)
    {
        $doctor = Doctor::create($request->all());
        return response()->json($doctor, 201);
    }

    // GET /api / doctors / {id} - Get a doctor by ID
    public function show($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            return response()->json($doctor);
        } else {
            return response()->json(["message" => "Doctor not found."], 404);
        }
    }

    // PUT /api / doctors / {id} - Update a doctor by ID
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $doctor->update($request->all());
            return response()->json($doctor);
        } else {
            return response()->json(["message" => "Doctor not found."], 404);
        }
    }

    // DELETE /api / doctors / {id} - Delete a doctor by ID
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $doctor->delete();
            return response()->json(["message" => "Doctor deleted."]);
        } else {
            return response()->json(["message" => "Doctor not found."], 404);
        }
    }
}