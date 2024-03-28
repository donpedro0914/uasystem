<?php

namespace App\Exports;

use App\Applications;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use DB;

class ApplicationExport implements FromCollection, WithHeadings
{
    protected $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        return Applications::select('users.name', 'users.email', 'users.phone', 'users.gender', 'users.dob', DB::raw("IF(applications.status = '1', 'approved', 'rejected') as application_status"))->leftJoin('users', 'users.id', '=', 'applications.user_id')->where('applications.job_id', $this->records)->get();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Email',
            'Phone',
            'Gender',
            'Date Of Birth',
            'Status'
        ];
    }
}
