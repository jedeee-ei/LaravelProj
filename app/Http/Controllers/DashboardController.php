<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\Activity;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'totalStudents' => Student::count(),
            'totalTeachers' => Teacher::count(),
            'totalClasses' => ClassRoom::count(),
            'presentToday' => Student::whereDate('last_attendance', today())->count(),
            'recentStudents' => Student::latest()->take(5)->get(),
            'recentActivities' => Activity::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}
