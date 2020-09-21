<?php

namespace App\Exports;

use App\Http\models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            "ID", "Username", "First Name", "Last Name", "Email", "Mobile_no","Created Date"
        ];
    }
}
