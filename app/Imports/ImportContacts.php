<?php
namespace App\Imports;
use App\Admin\Contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportContacts implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
            // dd($row);
            return new Contacts([
                'name'          => $row[0],
                'mobile'        => $row[1],
                'email'         => $row[2],
                'location'      => $row[3],
                'contact_type'  => $row[4],
                'source'        => $row[5],
                'website'       => $row[6],
                'additional_info' => $row[7],
                'status'        => 'ACTIVE',
            ]);
    }
}