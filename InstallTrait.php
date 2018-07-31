<?php

namespace go1\util_db;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use go1\util\DB;
use go1\util\schema\InstallTrait as ParentInstallTrait;
use go1\util_db\sequence\SequenceSchema;

trait InstallTrait
{
    use ParentInstallTrait {
        ParentInstallTrait::installGo1Schema as parentInstall;
    }

    public function installGo1Schema(Connection $db, $coreOnly = true, string $accountsName = null)
    {
        $this->parentInstall($db, $coreOnly, $accountsName);

        DB::install($db, [
            function (Schema $schema) {
                SequenceSchema::install($schema);
            }
        ]);
    }
}
