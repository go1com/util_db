<?php

namespace Go1\UtilDB\tests;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Go1\UtilDB\InstallTrait;
use PHPUnit\Framework\TestCase;

abstract class UtilDBTestCase extends TestCase
{
    use InstallTrait;

    /** @var  Connection */
    protected $db;

    public function setUp()
    {
        $this->db = DriverManager::getConnection(['url' => 'sqlite://sqlite::memory:']);
        $this->installGo1Schema($this->db);
    }
}
