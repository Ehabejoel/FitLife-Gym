<?php

namespace App\Services\Attendance;

class AttendanceService
{
    public function recordCheckIn($memberId)
    {
        return Attendance::create([
            'member_id' => $memberId,
            'check_in' => now(),
            'status' => 'checked_in'
        ]);
    }

    public function recordCheckOut($attendanceId)
    {
        return Attendance::where('id', $attendanceId)
            ->update([
                'check_out' => now(),
                'status' => 'completed'
            ]);
    }

    public function getMemberAttendanceHistory($memberId)
    {
        return Attendance::where('member_id', $memberId)
            ->orderBy('check_in', 'desc')
            ->get();
    }
}
