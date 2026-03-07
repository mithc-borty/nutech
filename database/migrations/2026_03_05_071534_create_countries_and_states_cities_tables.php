<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared(file_get_contents(database_path('sql/countries-states-cities/countries.sql')));
        DB::unprepared(file_get_contents(database_path('sql/countries-states-cities/states.sql')));

        $handle = fopen(database_path('sql/countries-states-cities/cities.sql'), 'r');
        $sql = '';
        while (!feof($handle)) {
            $line = fgets($handle);
            if (trim($line) === '' || strpos(trim($line), '--') === 0) {
                continue;
            }
            $sql .= $line;
            if (substr(trim($line), -1) === ';') {
                DB::unprepared($sql);
                $sql = '';
            }
        }
        fclose($handle);
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
};