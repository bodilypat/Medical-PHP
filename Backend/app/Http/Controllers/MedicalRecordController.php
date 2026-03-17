<!-- Medical Record Full REST API -->
<?php
namespace App\Http\Controllers;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // GET /api / medical-records - Get all medical records
    public function index()
    {
        $medicalRecords = MedicalRecord::all();
        return response()->json($medicalRecords);
    }

    // POST /api / medical-records - Create a new medical record
    public function store(Request $request)
    {
        $medicalRecord = MedicalRecord::create($request->all());
        return response()->json($medicalRecord, 201);
    }

    // GET /api / medical-records / {id} - Get a medical record by ID
    public function show($id)
    {
        $medicalRecord = MedicalRecord::find($id);
        if ($medicalRecord) {
            return response()->json($medicalRecord);
        } else {
            return response()->json(["message" => "Medical record not found."], 404);
        }
    }

    // PUT /api / medical-records / {id} - Update a medical record by ID
    public function update(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::find($id);
        if ($medicalRecord) {
            $medicalRecord->update($request->all());
            return response()->json($medicalRecord);
        } else {
            return response()->json(["message" => "Medical record not found."], 404);
        }
    }

    // DELETE /api / medical-records / {id} - Delete a medical record by ID
    public function destroy($id)
    {
        $medicalRecord = MedicalRecord::find($id);
        if ($medicalRecord) {
            $medicalRecord->delete();
            return response()->json(["message" => "Medical record deleted."]);
        } else {
            return response()->json(["message" => "Medical record not found."], 404);
        }
    }
}
