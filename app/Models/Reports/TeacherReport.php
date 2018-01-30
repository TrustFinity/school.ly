<?php

namespace App\Models\Reports;

use Carbon\Carbon;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class TeacherReport extends Model
{
    private $start_date;
    private $stop_date;

    /**
     * StudentReport constructor.
     */
    public function __construct( $start_date, $stop_date)
    {
        $this->start_date = $start_date == null ? Carbon::parse($start_date)->subYears(4) :
            Carbon::parse($start_date);
        $this->stop_date  = Carbon::parse($stop_date);
        $this->generateReport();
    }

    public function generateReport()
    {
        return Teacher::whereBetween('joining_year', [$this->start_date, $this->stop_date])
            ->with('stream.classGroup')
            ->paginate(40);
    }
}
