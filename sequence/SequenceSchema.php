<?php

namespace Go1\UtilDB\Sequence;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

class SequenceSchema
{
    public static function install(Schema $schema)
    {
        if (!$schema->hasTable('gc_sequence')) {
            $sequence = $schema->createTable('gc_sequence');
            $sequence->addColumn('id', Type::INTEGER, ['unsigned' => true, 'length' => 69]);
            $sequence->addColumn('type', Type::STRING);
            $sequence->setPrimaryKey(['id', 'type']);
        }
    }
}
