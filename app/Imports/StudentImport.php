<?php

namespace App\Imports;

use App\Models\Post;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow, WithChunkReading
{

    public function model(array $row)
    {
        //cant insert csv file type.
        $data = Post::create([
            'title' => $row['title'],
            'description' => bcrypt($row['description']),
        ]);

        return $data;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }


    public function headingRow(): int
    {
        return 1;
    }
}
