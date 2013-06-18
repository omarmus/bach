<?php


/**
 * Base class that represents a query for the 'sys_users' table.
 *
 * 
 *
 * @method SysUsersQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method SysUsersQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method SysUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method SysUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method SysUsersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method SysUsersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 *
 * @method SysUsersQuery groupByIdUser() Group by the id_user column
 * @method SysUsersQuery groupByUsername() Group by the username column
 * @method SysUsersQuery groupByPassword() Group by the password column
 * @method SysUsersQuery groupByEmail() Group by the email column
 * @method SysUsersQuery groupByFirstName() Group by the first_name column
 * @method SysUsersQuery groupByLastName() Group by the last_name column
 *
 * @method SysUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysUsersQuery leftJoinSysRolesXUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysRolesXUser relation
 * @method SysUsersQuery rightJoinSysRolesXUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysRolesXUser relation
 * @method SysUsersQuery innerJoinSysRolesXUser($relationAlias = null) Adds a INNER JOIN clause to the query using the SysRolesXUser relation
 *
 * @method SysUsers findOne(PropelPDO $con = null) Return the first SysUsers matching the query
 * @method SysUsers findOneOrCreate(PropelPDO $con = null) Return the first SysUsers matching the query, or a new SysUsers object populated from the query conditions when no match is found
 *
 * @method SysUsers findOneByUsername(string $username) Return the first SysUsers filtered by the username column
 * @method SysUsers findOneByPassword(string $password) Return the first SysUsers filtered by the password column
 * @method SysUsers findOneByEmail(string $email) Return the first SysUsers filtered by the email column
 * @method SysUsers findOneByFirstName(string $first_name) Return the first SysUsers filtered by the first_name column
 * @method SysUsers findOneByLastName(string $last_name) Return the first SysUsers filtered by the last_name column
 *
 * @method array findByIdUser(int $id_user) Return SysUsers objects filtered by the id_user column
 * @method array findByUsername(string $username) Return SysUsers objects filtered by the username column
 * @method array findByPassword(string $password) Return SysUsers objects filtered by the password column
 * @method array findByEmail(string $email) Return SysUsers objects filtered by the email column
 * @method array findByFirstName(string $first_name) Return SysUsers objects filtered by the first_name column
 * @method array findByLastName(string $last_name) Return SysUsers objects filtered by the last_name column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysUsersQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysUsersQuery object.
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
            $modelName = 'SysUsers';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysUsersQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysUsersQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysUsersQuery) {
            return $criteria;
        }
        $query = new SysUsersQuery(null, null, $modelAlias);

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
     * @return   SysUsers|SysUsers[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysUsersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysUsers A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdUser($key, $con = null)
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
     * @return                 SysUsers A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_user`, `username`, `password`, `email`, `first_name`, `last_name` FROM `sys_users` WHERE `id_user` = :p0';
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
            $obj = new SysUsers();
            $obj->hydrate($row);
            SysUsersPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysUsers|SysUsers[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysUsers[]|mixed the list of results, formatted by the current formatter
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
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUser(1234); // WHERE id_user = 1234
     * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
     * $query->filterByIdUser(array('min' => 12)); // WHERE id_user >= 12
     * $query->filterByIdUser(array('max' => 12)); // WHERE id_user <= 12
     * </code>
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query by a related SysRolesXUser object
     *
     * @param   SysRolesXUser|PropelObjectCollection $sysRolesXUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysRolesXUser($sysRolesXUser, $comparison = null)
    {
        if ($sysRolesXUser instanceof SysRolesXUser) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_USER, $sysRolesXUser->getIdUser(), $comparison);
        } elseif ($sysRolesXUser instanceof PropelObjectCollection) {
            return $this
                ->useSysRolesXUserQuery()
                ->filterByPrimaryKeys($sysRolesXUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysRolesXUser() only accepts arguments of type SysRolesXUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysRolesXUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysRolesXUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysRolesXUser');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysRolesXUser');
        }

        return $this;
    }

    /**
     * Use the SysRolesXUser relation SysRolesXUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysRolesXUserQuery A secondary query class using the current class as primary query
     */
    public function useSysRolesXUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysRolesXUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysRolesXUser', 'SysRolesXUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysUsers $sysUsers Object to remove from the list of results
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function prune($sysUsers = null)
    {
        if ($sysUsers) {
            $this->addUsingAlias(SysUsersPeer::ID_USER, $sysUsers->getIdUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
