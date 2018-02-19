<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\SupportStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportStaffApiController extends Controller
{
    public function search (Request $request)
    {
        $support_staffs = SupportStaff::where('search_term', 'LIKE', '%'.$request->search.'%')
				            ->limit(10)
				            ->get();
        return $support_staffs;
    }
}
