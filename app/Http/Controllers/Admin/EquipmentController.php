namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::with(['facility'])->paginate(10);
        return view('admin.equipment.index', compact('equipment'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'facility_id' => 'required|exists:facilities,id',
            'status' => 'required|in:active,maintenance,inactive',
            'maintenance_date' => 'nullable|date'
        ]);

        Equipment::create($validated);
        return redirect()->route('equipment.index')->with('success', 'Equipment created');
    }

    // ...existing code for update/delete methods...
}