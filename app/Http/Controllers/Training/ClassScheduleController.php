namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $schedules = ClassSchedule::with(['attendances'])->latest()->paginate(10);
        return view('training.schedules.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string',
            'instructor' => 'required|string',
            'facility_id' => 'required|exists:facilities,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'capacity' => 'required|integer|min:1'
        ]);

        ClassSchedule::create($validated);
        return redirect()->route('schedules.index')->with('success', 'Schedule created');
    }

    // ...existing code for update/delete methods...
}
