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

    public static function bump(Connection $db, string $type)
    {
        return self::safeThread($db, "bump:{$type}", 30, function(Connection $db) {
            $db->insert('gc_sequence', [
                'id'   => ((int) $db->lastInsertId('gc_sequence') + 1),
                'type' => $options['type'] ?? 'portal',
            ]);
            $id = $db->lastInsertId('gc_sequence');

            return $id;
        });
    }
}
