namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with(['equipment'])->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:active,maintenance,inactive'
        ]);

        Facility::create($validated);
        return redirect()->route('facilities.index')->with('success', 'Facility created');
    }

    // ...existing code for update/delete methods...
}
