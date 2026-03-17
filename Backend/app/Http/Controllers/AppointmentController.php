<!-- Appointment Full REST API -->
<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // GET /api / appointments - Get all appointments
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    // POST /api / appointments - Create a new appointment
    public function store(Request $request)
    {
        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    // GET /api / appointments / {id} - Get an appointment by ID
    public function show($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            return response()->json($appointment);
        } else {
            return response()->json(["message" => "Appointment not found."], 404);
        }
    }

    // PUT /api / appointments / {id} - Update an appointment by ID
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->update($request->all());
            return response()->json($appointment);
        } else {
            return response()->json(["message" => "Appointment not found."], 404);
        }
    }

    // DELETE /api / appointments / {id} - Delete an appointment by ID
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->delete();
            return response()->json(["message" => "Appointment deleted."]);
        } else {
            return response()->json(["message" => "Appointment not found."], 404);
        }
    }
}
