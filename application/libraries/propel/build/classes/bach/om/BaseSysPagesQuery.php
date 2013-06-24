<?php


/**
 * Base class that represents a query for the 'sys_pages' table.
 *
 * 
 *
 * @method SysPagesQuery orderByIdPage($order = Criteria::ASC) Order by the id_page column
 * @method SysPagesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method SysPagesQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method SysPagesQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method SysPagesQuery orderByBody($order = Criteria::ASC) Order by the body column
 *
 * @method SysPagesQuery groupByIdPage() Group by the id_page column
 * @method SysPagesQuery groupByTitle() Group by the title column
 * @method SysPagesQuery groupBySlug() Group by the slug column
 * @method SysPagesQuery groupByOrder() Group by the order column
 * @method SysPagesQuery groupByBody() Group by the body column
 *
 * @method SysPagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysPagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysPagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysPages findOne(PropelPDO $con = null) Return the first SysPages matching the query
 * @method SysPages findOneOrCreate(PropelPDO $con = null) Return the first SysPages matching the query, or a new SysPages object populated from the query conditions when no match is found
 *
 * @method SysPages findOneByTitle(string $title) Return the first SysPages filtered by the title column
 * @method SysPages findOneBySlug(string $slug) Return the first SysPages filtered by the slug column
 * @method SysPages findOneByOrder(int $order) Return the first SysPages filtered by the order column
 * @method SysPages findOneByBody(string $body) Return the first SysPages filtered by the body column
 *
 * @method array findByIdPage(int $id_page) Return SysPages objects filtered by the id_page column
 * @method array findByTitle(string $title) Return SysPages objects filtered by the title column
 * @method array findBySlug(string $slug) Return SysPages objects filtered by the slug column
 * @method array findByOrder(int $order) Return SysPages objects filtered by the order column
 * @method array findByBody(string $body) Return SysPages objects filtered by the body column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysPagesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysPagesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'bach';
        }
        if (null === $modelName) {
            $modelName = 'SysPages';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysPagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysPagesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysPagesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysPagesQuery) {
            return $criteria;
        }
        $query = new SysPagesQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SysPages|SysPages[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysPagesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysPagesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysPages A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPage($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysPages A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_page`, `title`, `slug`, `order`, `body` FROM `sys_pages` WHERE `id_page` = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SysPages();
            $obj->hydrate($row);
            SysPagesPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return SysPages|SysPages[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SysPages[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysPagesPeer::ID_PAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysPagesPeer::ID_PAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_page column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPage(1234); // WHERE id_page = 1234
     * $query->filterByIdPage(array(12, 34)); // WHERE id_page IN (12, 34)
     * $query->filterByIdPage(array('min' => 12)); // WHERE id_page >= 12
     * $query->filterByIdPage(array('max' => 12)); // WHERE id_page <= 12
     * </code>
     *
     * @param     mixed $idPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByIdPage($idPage = null, $comparison = null)
    {
        if (is_array($idPage)) {
            $useMinMax = false;
            if (isset($idPage['min'])) {
                $this->addUsingAlias(SysPagesPeer::ID_PAGE, $idPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPage['max'])) {
                $this->addUsingAlias(SysPagesPeer::ID_PAGE, $idPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysPagesPeer::ID_PAGE, $idPage, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPagesPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slug)) {
                $slug = str_replace('*', '%', $slug);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPagesPeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the order column
     *
     * Example usage:
     * <code>
     * $query->filterByOrder(1234); // WHERE order = 1234
     * $query->filterByOrder(array(12, 34)); // WHERE order IN (12, 34)
     * $query->filterByOrder(array('min' => 12)); // WHERE order >= 12
     * $query->filterByOrder(array('max' => 12)); // WHERE order <= 12
     * </code>
     *
     * @param     mixed $order The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_array($order)) {
            $useMinMax = false;
            if (isset($order['min'])) {
                $this->addUsingAlias(SysPagesPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($order['max'])) {
                $this->addUsingAlias(SysPagesPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysPagesPeer::ORDER, $order, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * Example usage:
     * <code>
     * $query->filterByBody('fooValue');   // WHERE body = 'fooValue'
     * $query->filterByBody('%fooValue%'); // WHERE body LIKE '%fooValue%'
     * </code>
     *
     * @param     string $body The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($body)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $body)) {
                $body = str_replace('*', '%', $body);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPagesPeer::BODY, $body, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SysPages $sysPages Object to remove from the list of results
     *
     * @return SysPagesQuery The current query, for fluid interface
     */
    public function prune($sysPages = null)
    {
        if ($sysPages) {
            $this->addUsingAlias(SysPagesPeer::ID_PAGE, $sysPages->getIdPage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}