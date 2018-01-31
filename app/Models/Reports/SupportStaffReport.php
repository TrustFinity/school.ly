<?php

namespace App\Models\Reports;

use App\Models\SupportStaff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SupportStaffReport extends Model
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
        return SupportStaff::whereBetween('created_at', [$this->start_date, $this->stop_date])
            ->paginate(40);
    }
}
