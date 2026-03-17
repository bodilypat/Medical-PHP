<!-- Billing Full REST API -->

<?php
namespace App\Http\Controllers;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    // GET /api / billings - Get all billings
    public function index()
    {
        $billings = Billing::all();
        return response()->json($billings);
    }

    // POST /api / billings - Create a new billing
    public function store(Request $request)
    {
        $billing = Billing::create($request->all());
        return response()->json($billing, 201);
    }

    // GET /api / billings / {id} - Get a billing by ID
    public function show($id)
    {
        $billing = Billing::find($id);
        if ($billing) {
            return response()->json($billing);
        } else {
            return response()->json(["message" => "Billing not found."], 404);
        }
    }

    // PUT /api / billings / {id} - Update a billing by ID
    public function update(Request $request, $id)
    {
        $billing = Billing::find($id);
        if ($billing) {
            $billing->update($request->all());
            return response()->json($billing);
        } else {
            return response()->json(["message" => "Billing not found."], 404);
        }
    }

    // DELETE /api / billings / {id} - Delete a billing by ID
    public function destroy($id)
    {
        $billing = Billing::find($id);
        if ($billing) {
            $billing->delete();
            return response()->json(["message" => "Billing deleted."]);
        } else {
            return response()->json(["message" => "Billing not found."], 404);
        }
    }
}

