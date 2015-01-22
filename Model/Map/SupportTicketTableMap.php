<?php

namespace SupportTicket\Model\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use SupportTicket\Model\SupportTicket;
use SupportTicket\Model\SupportTicketQuery;


/**
 * This class defines the structure of the 'support_ticket' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SupportTicketTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'SupportTicket.Model.Map.SupportTicketTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'support_ticket';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SupportTicket\\Model\\SupportTicket';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SupportTicket.Model.SupportTicket';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the ID field
     */
    const ID = 'support_ticket.ID';

    /**
     * the column name for the STATUS field
     */
    const STATUS = 'support_ticket.STATUS';

    /**
     * the column name for the CUSTOMER_ID field
     */
    const CUSTOMER_ID = 'support_ticket.CUSTOMER_ID';

    /**
     * the column name for the ADMIN_ID field
     */
    const ADMIN_ID = 'support_ticket.ADMIN_ID';

    /**
     * the column name for the ORDER_ID field
     */
    const ORDER_ID = 'support_ticket.ORDER_ID';

    /**
     * the column name for the ORDER_PRODUCT_ID field
     */
    const ORDER_PRODUCT_ID = 'support_ticket.ORDER_PRODUCT_ID';

    /**
     * the column name for the SUBJECT field
     */
    const SUBJECT = 'support_ticket.SUBJECT';

    /**
     * the column name for the MESSAGE field
     */
    const MESSAGE = 'support_ticket.MESSAGE';

    /**
     * the column name for the RESPONSE field
     */
    const RESPONSE = 'support_ticket.RESPONSE';

    /**
     * the column name for the COMMENT field
     */
    const COMMENT = 'support_ticket.COMMENT';

    /**
     * the column name for the CREATED_AT field
     */
    const CREATED_AT = 'support_ticket.CREATED_AT';

    /**
     * the column name for the UPDATED_AT field
     */
    const UPDATED_AT = 'support_ticket.UPDATED_AT';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Status', 'CustomerId', 'AdminId', 'OrderId', 'OrderProductId', 'Subject', 'Message', 'Response', 'Comment', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'status', 'customerId', 'adminId', 'orderId', 'orderProductId', 'subject', 'message', 'response', 'comment', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SupportTicketTableMap::ID, SupportTicketTableMap::STATUS, SupportTicketTableMap::CUSTOMER_ID, SupportTicketTableMap::ADMIN_ID, SupportTicketTableMap::ORDER_ID, SupportTicketTableMap::ORDER_PRODUCT_ID, SupportTicketTableMap::SUBJECT, SupportTicketTableMap::MESSAGE, SupportTicketTableMap::RESPONSE, SupportTicketTableMap::COMMENT, SupportTicketTableMap::CREATED_AT, SupportTicketTableMap::UPDATED_AT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'STATUS', 'CUSTOMER_ID', 'ADMIN_ID', 'ORDER_ID', 'ORDER_PRODUCT_ID', 'SUBJECT', 'MESSAGE', 'RESPONSE', 'COMMENT', 'CREATED_AT', 'UPDATED_AT', ),
        self::TYPE_FIELDNAME     => array('id', 'status', 'customer_id', 'admin_id', 'order_id', 'order_product_id', 'subject', 'message', 'response', 'comment', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Status' => 1, 'CustomerId' => 2, 'AdminId' => 3, 'OrderId' => 4, 'OrderProductId' => 5, 'Subject' => 6, 'Message' => 7, 'Response' => 8, 'Comment' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'status' => 1, 'customerId' => 2, 'adminId' => 3, 'orderId' => 4, 'orderProductId' => 5, 'subject' => 6, 'message' => 7, 'response' => 8, 'comment' => 9, 'createdAt' => 10, 'updatedAt' => 11, ),
        self::TYPE_COLNAME       => array(SupportTicketTableMap::ID => 0, SupportTicketTableMap::STATUS => 1, SupportTicketTableMap::CUSTOMER_ID => 2, SupportTicketTableMap::ADMIN_ID => 3, SupportTicketTableMap::ORDER_ID => 4, SupportTicketTableMap::ORDER_PRODUCT_ID => 5, SupportTicketTableMap::SUBJECT => 6, SupportTicketTableMap::MESSAGE => 7, SupportTicketTableMap::RESPONSE => 8, SupportTicketTableMap::COMMENT => 9, SupportTicketTableMap::CREATED_AT => 10, SupportTicketTableMap::UPDATED_AT => 11, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'STATUS' => 1, 'CUSTOMER_ID' => 2, 'ADMIN_ID' => 3, 'ORDER_ID' => 4, 'ORDER_PRODUCT_ID' => 5, 'SUBJECT' => 6, 'MESSAGE' => 7, 'RESPONSE' => 8, 'COMMENT' => 9, 'CREATED_AT' => 10, 'UPDATED_AT' => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'status' => 1, 'customer_id' => 2, 'admin_id' => 3, 'order_id' => 4, 'order_product_id' => 5, 'subject' => 6, 'message' => 7, 'response' => 8, 'comment' => 9, 'created_at' => 10, 'updated_at' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('support_ticket');
        $this->setPhpName('SupportTicket');
        $this->setClassName('\\SupportTicket\\Model\\SupportTicket');
        $this->setPackage('SupportTicket.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('STATUS', 'Status', 'TINYINT', true, null, 0);
        $this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'INTEGER', 'customer', 'ID', true, null, null);
        $this->addForeignKey('ADMIN_ID', 'AdminId', 'INTEGER', 'admin', 'ID', false, null, null);
        $this->addForeignKey('ORDER_ID', 'OrderId', 'INTEGER', 'order', 'ID', false, null, null);
        $this->addForeignKey('ORDER_PRODUCT_ID', 'OrderProductId', 'INTEGER', 'order_product', 'ID', false, null, null);
        $this->addColumn('SUBJECT', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('MESSAGE', 'Message', 'CLOB', false, null, null);
        $this->addColumn('RESPONSE', 'Response', 'CLOB', false, null, null);
        $this->addColumn('COMMENT', 'Comment', 'CLOB', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', '\\Thelia\\Model\\Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), 'CASCADE', 'RESTRICT');
        $this->addRelation('Admin', '\\Thelia\\Model\\Admin', RelationMap::MANY_TO_ONE, array('admin_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Order', '\\Thelia\\Model\\Order', RelationMap::MANY_TO_ONE, array('order_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('OrderProduct', '\\Thelia\\Model\\OrderProduct', RelationMap::MANY_TO_ONE, array('order_product_id' => 'id', ), 'SET NULL', null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SupportTicketTableMap::CLASS_DEFAULT : SupportTicketTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (SupportTicket object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SupportTicketTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SupportTicketTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SupportTicketTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SupportTicketTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SupportTicketTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SupportTicketTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SupportTicketTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SupportTicketTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SupportTicketTableMap::ID);
            $criteria->addSelectColumn(SupportTicketTableMap::STATUS);
            $criteria->addSelectColumn(SupportTicketTableMap::CUSTOMER_ID);
            $criteria->addSelectColumn(SupportTicketTableMap::ADMIN_ID);
            $criteria->addSelectColumn(SupportTicketTableMap::ORDER_ID);
            $criteria->addSelectColumn(SupportTicketTableMap::ORDER_PRODUCT_ID);
            $criteria->addSelectColumn(SupportTicketTableMap::SUBJECT);
            $criteria->addSelectColumn(SupportTicketTableMap::MESSAGE);
            $criteria->addSelectColumn(SupportTicketTableMap::RESPONSE);
            $criteria->addSelectColumn(SupportTicketTableMap::COMMENT);
            $criteria->addSelectColumn(SupportTicketTableMap::CREATED_AT);
            $criteria->addSelectColumn(SupportTicketTableMap::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.STATUS');
            $criteria->addSelectColumn($alias . '.CUSTOMER_ID');
            $criteria->addSelectColumn($alias . '.ADMIN_ID');
            $criteria->addSelectColumn($alias . '.ORDER_ID');
            $criteria->addSelectColumn($alias . '.ORDER_PRODUCT_ID');
            $criteria->addSelectColumn($alias . '.SUBJECT');
            $criteria->addSelectColumn($alias . '.MESSAGE');
            $criteria->addSelectColumn($alias . '.RESPONSE');
            $criteria->addSelectColumn($alias . '.COMMENT');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SupportTicketTableMap::DATABASE_NAME)->getTable(SupportTicketTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(SupportTicketTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(SupportTicketTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new SupportTicketTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a SupportTicket or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SupportTicket object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupportTicketTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SupportTicket\Model\SupportTicket) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SupportTicketTableMap::DATABASE_NAME);
            $criteria->add(SupportTicketTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = SupportTicketQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { SupportTicketTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { SupportTicketTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the support_ticket table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SupportTicketQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SupportTicket or Criteria object.
     *
     * @param mixed               $criteria Criteria or SupportTicket object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupportTicketTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SupportTicket object
        }

        if ($criteria->containsKey(SupportTicketTableMap::ID) && $criteria->keyContainsValue(SupportTicketTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupportTicketTableMap::ID.')');
        }


        // Set the correct dbName
        $query = SupportTicketQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // SupportTicketTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SupportTicketTableMap::buildTableMap();
