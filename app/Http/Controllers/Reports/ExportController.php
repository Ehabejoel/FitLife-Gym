<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Exports\MembershipExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportMembers()
    {
        return Excel::download(new MembershipExport, 'members.xlsx');
    }

    public function exportRevenue()
    {
        return Excel::download(new RevenueExport, 'revenue.xlsx');
    }
}
