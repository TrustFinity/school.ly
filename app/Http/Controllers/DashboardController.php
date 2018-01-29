<?php

namespace App\Http\Controllers;

use Auth;
use Charts;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SupportStaff;

class DashboardController extends Controller
{
    public function index()
    {
        if ((Auth::user()->school->preferences === null) || (Auth::user()->school->classGroups->count() === 0)) {
            return redirect('/settings');
        }

        $teachers =  Teacher::all();
        $students = Student::all();
        $support_staff = SupportStaff::all();

        $student_chart = Charts::database($students, 'pie', 'chartjs')
            ->title("Gender")
            ->responsive(false)
            ->groupBy('gender');
        $teacher_chart = Charts::database($teachers, 'pie', 'chartjs')
            ->title("Gender")
            ->responsive(false)
            ->groupBy('gender');
        $support_staff_chart = Charts::database($support_staff, 'donut', 'chartjs')
            ->title("Gender")
            ->responsive(false)
            ->groupBy('gender');

        $growth_per_year = Charts::multiDatabase('bar', 'chartjs')
            ->title("Growth per Year")
            ->colors(['#42d7f4', '#41f4e5', '#f4c441'])
            ->dataset('Students', $students)
            ->dataset('Teachers', $teachers)
            ->dataset('Support Staff', $support_staff)
            ->responsive(false)
            ->groupByYear();

        $performance = Charts::multi('areaspline', 'highcharts')
            ->title('Performance by Gender Over the years ')
            ->colors(['#ff0000', '#ffffff'])
            ->dataset('Male', Student::malePerformance())
            ->dataset('Female',  Student::femalePerformance());

        return view('dashboard.index', compact(
            'teachers',
            'students',
            'support_staff',
            'student_chart',
            'teacher_chart',
            'support_staff_chart',
            'growth_per_year',
            'performance'));
    }
}
