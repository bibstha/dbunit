<?php
/*
 * This file is part of DBUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\DbUnit\DataSet;

use PHPUnit_Extensions_Database_DataSet_ITable;
use PHPUnit_Extensions_Database_DataSet_ITableIterator;

/**
 * The default implementation of a data set.
 */
class DefaultDataSet extends AbstractDataSet
{
    /**
     * An array of ITable objects.
     *
     * @var array
     */
    protected $tables;

    /**
     * Creates a new dataset using the given tables.
     *
     * @param array $tables
     */
    public function __construct(array $tables = [])
    {
        $this->tables = $tables;
    }

    /**
     * Adds a table to the dataset.
     *
     * @param PHPUnit_Extensions_Database_DataSet_ITable $table
     */
    public function addTable(PHPUnit_Extensions_Database_DataSet_ITable $table)
    {
        $this->tables[] = $table;
    }

    /**
     * Creates an iterator over the tables in the data set. If $reverse is
     * true a reverse iterator will be returned.
     *
     * @param  bool $reverse
     * @return PHPUnit_Extensions_Database_DataSet_ITableIterator
     */
    protected function createIterator($reverse = false)
    {
        return new DefaultTableIterator($this->tables, $reverse);
    }
}
