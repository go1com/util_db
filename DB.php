<?php

namespace go1\util_db;

use Doctrine\DBAL\Connection;
use go1\util\DB as ParentDB;

class DB extends ParentDB
{
    const PORTAL        = 'portal';
    const LO            = 'lo';
    const USER          = 'user';
    const ENROLLMENT    = 'enrollment';
    const PROFILE       = 'profile';
    const TAG           = 'tag';

    public static function bump(Connection $db, string $type)
    {
        return self::safeThread($db, "bump:{$type}", 30, function(Connection $db) use ($type) {
            $id = (int) $db->fetchColumn('SELECT MAX(id)+1 FROM gc_sequence WHERE type = ?', [$type]) ?: 1;
            $db->insert('gc_sequence', [
                'id'   => $id,
                'type' => $type,
            ]);

            return $id;
        });
    }
}
