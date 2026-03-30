<?php

namespace Database\Seeders;

use App\Models\Reporter;
use Illuminate\Database\Seeder;

class ReporterSeeder extends Seeder
{
    public function run(): void
    {
        Reporter::create([
            'name' => 'John Doe',
            'email' => 'john.doe@campus.edu',
            'phone' => '555-0101',
            'dorm' => 'Dorm A Room 101',
        ]);

        Reporter::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@campus.edu',
            'phone' => '555-0102',
            'dorm' => 'Dorm B Room 205',
        ]);
    }
}
?>
