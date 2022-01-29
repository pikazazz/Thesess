<?php

namespace App\Exports;

use App\Models\UserExport;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BulkExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // use Exportable;

    function __construct($init_parameter)
    {
        $this->some_parameter = $init_parameter;
    }

    public function headings(): array
    {
        return [
            'number',
            'Username',
            'Password',
            'create_at',
            'Last_update',
        ];
    }
    public function query()
    {

        return UserExport::query();
        /*you can use condition in query to get required result
         return Bulk::query()->whereRaw('id > 5');*/
    }
}
