<?php

namespace Go1\UtilDB\Sequence;

use Doctrine\DBAL\Connection;

trait SequenceMockTrait
{
    protected function createSequence(Connection $db, array $options = [])
    {
        $db->insert('gc_sequence', [
            'id'   => ($db->lastInsertId('gc_sequence') + 1),
            'type' => $options['type'] ?? 'portal',
        ]);

        $id = $db->lastInsertId('gc_sequence');

        return $id;
    }
}
