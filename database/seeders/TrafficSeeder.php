<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrafficSeeder extends Seeder
{
    private function rows(string $file): array
    {
        $lines = file(database_path('data/' . $file), FILE_SKIP_EMPTY_LINES);
        array_shift($lines); // header
        return array_map(fn ($l) => explode("\t", rtrim($l, "\r\n")), $lines);
    }

    public function run()
    {
        foreach ($this->rows('naming.txt') as $r) {
            DB::table('naming')->insert(['id' => $r[0], 'nev' => $r[1]]);
        }
        foreach ($this->rows('extent.txt') as $r) {
            DB::table('extent')->insert(['id' => $r[0], 'nev' => $r[1]]);
        }
        $batch = [];
        foreach ($this->rows('restriction.txt') as $r) {
            $batch[] = [
                'roadnumber' => (int) $r[0],
                'frompoint'  => (float) str_replace(',', '.', $r[1]),
                'topoint'    => (float) str_replace(',', '.', $r[2]),
                'settlement' => $r[3],
                'fromdate'   => str_replace('.', '-', $r[4]),
                'todate'     => str_replace('.', '-', $r[5]),
                'namingid'   => (int) $r[6],
                'extentid'   => (int) $r[7],
                'speed'      => ($r[8] ?? '') === '' ? null : (int) $r[8],
            ];
        }
        foreach (array_chunk($batch, 50) as $chunk) {
            DB::table('restriction')->insert($chunk);
        }
    }
}
