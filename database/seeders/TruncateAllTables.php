<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * @link https://itzone.com.vn/en/article/how-to-truncate-and-then-seed-all-laravel-tables/
 */
class TruncateAllTables extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema:: disableForeignKeyConstraints();

        foreach ($this->getTargetTableNames() as $tableName) {
            DB:: table($tableName)->truncate();
        }

        Schema:: enableForeignKeyConstraints();
    }

    /**
     * @return mixed
     */
    private function getTargetTableNames(): array
    {
        $excludes = ['migrations'];
        return array_diff($this->getAllTableNames(), $excludes);
    }

    /**
     * @return array
     */
    private function getAllTableNames(): array
    {
        return DB:: connection()->getDoctrineSchemaManager()->listTableNames();
    }
}
