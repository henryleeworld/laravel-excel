<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\User;

class UsersImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'name'     => $row['name'],
           'email'    => $row['email'], 
           'password' => $row['password'],
        ]);
    }

    public function batchSize(): int
    {
        return 500;
    }
    
    public function chunkSize(): int
    {
        return 500;
    }
}
