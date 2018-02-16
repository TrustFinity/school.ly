<?php

namespace App\Http\Controllers;

use Auth;
use Charts;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SupportStaff;
use App\Models\Attendances\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        //todo pius: work on this
        // if ((Auth::user()->school->preferences === null) || (Auth::user()->school->classGroups->count() === 0)) {
        //     return view('dashboard.setup');
        // }

        $teachers =  Teacher::all();
        $students = Student::all();
        $support_staff = SupportStaff::all();
        $attendances = Attendance::where('date', Carbon::now()->toDateString())->get();

        $student_chart = Charts::database($students, 'pie', 'chartjs')
            ->title(getPreference()->attendants_type." Gender")
            ->colors(['#5D6D7E', '#82E0AA'])
            ->responsive(false)
            ->groupBy('gender');
        $teacher_chart = Charts::database($teachers, 'pie', 'chartjs')
            ->title(getPreference()->instructors_type." Gender")
            ->colors(['#5D6D7E', '#82E0AA'])
            ->responsive(false)
            ->groupBy('gender');
        $support_staff_chart = Charts::database($support_staff, 'donut', 'chartjs')
            ->title("Support Staff Gender")
            ->colors(['#5D6D7E', '#85C1E9', '#82E0AA'])
            ->responsive(false)
            ->groupBy('gender');

        $growth_per_year = Charts::multiDatabase('bar', 'chartjs')
            ->title("Growth per Year")
            ->colors(['#58D68D', '#FFAB91', '#F1C40F'])
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
            'performance',
            'attendances'
        ));
    }
}
