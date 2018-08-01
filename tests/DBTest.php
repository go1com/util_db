<?php

namespace go1\util_db\tests;

use go1\util_db\DB;

class DBTest extends UtilDBTestCase
{
    public function testBumpSingle()
    {
        $id = DB::bump($this->db, DB::PORTAL);
        $this->assertEquals(1, $id);
    }

    public function testBumpMultiple()
    {
        $i = 1;
        while ($i <= 100) {
            $id = DB::bump($this->db, DB::PORTAL);
            $i++;
        }
        $this->assertEquals(100, $id);
    }

    public function testBumpType()
    {
        $i = 1;
        while ($i <= 100) {
            $id = DB::bump($this->db, DB::PORTAL);
            $i++;
        }
        $this->assertEquals(100, $id);

        $i = 1;
        while ($i <= 50) {
            $id = DB::bump($this->db, DB::LO);
            $i++;
        }
        $this->assertEquals(50, $id);
    }
}
