<?php

namespace Apps\Games\Packages\Install;

use Apps\Games\Packages\Install\Schema\Home;
use System\Base\BasePackage;

class Package extends BasePackage
{
    public function install()
    {
        //Run Install
        $this->installSchema();
    }

    public function update()
    {
        //Run version specific Updates
    }

    public function uninstall()
    {
        //Check Relationship
        //Drop Table(s)
        $this->dropTable('table_name');
    }

    public function reinstall()
    {
        //Remove this from production
        $this->installSchema(true);
    }

    //Install Schema
    protected function installSchema(bool $dropTables = false)
    {
        try {
            if ($dropTables) {
                $this->createTable('table_name', '', (new Home)->columns(), $dropTables);
                $this->addIndex('table_name', (new Home)->indexes());//Add index if any after creating table
            } else {
                $this->createTable('table_name', '', (new Home)->columns());
                $this->addIndex('table_name', (new Home)->indexes());
            }

            return true;
        } catch (\PDOException $e) {
            //Do something
        }
    }

    protected function modifySchema()
    {
        // Example of adding new column to table
        // $this->alterTable(
        //     'add',
        //     'table_name',
        //     [
        //         new Column(
        //             'added',
        //             [
        //                 'type'          => Column::TYPE_VARCHAR,
        //                 'size'          => 1024,
        //                 'notNull'       => false,
        //                 'comment'       => 'ADDED'
        //             ]
        //         ),
        //         new Column(
        //             'added_2',
        //             [
        //                 'type'          => Column::TYPE_VARCHAR,
        //                 'size'          => 1024,
        //                 'notNull'       => false,
        //                 'comment'       => 'ADDED 2'
        //             ]
        //         )
        //     ]
        // );

        // Example of modifying column to table
        // $this->alterTable(
        //     'modify',
        //     'table_name',
        //     [
        //         new Column(
        //             'added',
        //             [
        //                 'type'          => Column::TYPE_VARCHAR,
        //                 'size'          => 100,
        //                 'notNull'       => false,
        //                 'comment'       => 'ADDED'
        //             ]
        //         ),
        //         new Column(
        //             'added_2',
        //             [
        //                 'type'          => Column::TYPE_VARCHAR,
        //                 'size'          => 100,
        //                 'notNull'       => false,
        //                 'comment'       => 'ADDED 2'
        //             ]
        //         )
        //     ]
        // );
        //
        // Example of deleting column from table
        // $this->alterTable(
        //     'drop',
        //     'table_name',
        //     [
        //         'added',
        //         'added_2',
        //     ]
        // );

        // Example of dropping index
        // $this->dropIndex('table_name', 'column_contact_mobile_index');
    }
}