<?php


/**
 * Base class that represents a query for the 'sys_roles_x_user' table.
 *
 * 
 *
 * @method SysRolesXUserQuery orderByIdRol($order = Criteria::ASC) Order by the id_rol column
 * @method SysRolesXUserQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 *
 * @method SysRolesXUserQuery groupByIdRol() Group by the id_rol column
 * @method SysRolesXUserQuery groupByIdUser() Group by the id_user column
 *
 * @method SysRolesXUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysRolesXUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysRolesXUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysRolesXUserQuery leftJoinSysUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsers relation
 * @method SysRolesXUserQuery rightJoinSysUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsers relation
 * @method SysRolesXUserQuery innerJoinSysUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsers relation
 *
 * @method SysRolesXUserQuery leftJoinSysRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysRoles relation
 * @method SysRolesXUserQuery rightJoinSysRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysRoles relation
 * @method SysRolesXUserQuery innerJoinSysRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the SysRoles relation
 *
 * @method SysRolesXUser findOne(PropelPDO $con = null) Return the first SysRolesXUser matching the query
 * @method SysRolesXUser findOneOrCreate(PropelPDO $con = null) Return the first SysRolesXUser matching the query, or a new SysRolesXUser object populated from the query conditions when no match is found
 *
 * @method SysRolesXUser findOneByIdRol(int $id_rol) Return the first SysRolesXUser filtered by the id_rol column
 * @method SysRolesXUser findOneByIdUser(int $id_user) Return the first SysRolesXUser filtered by the id_user column
 *
 * @method array findByIdRol(int $id_rol) Return SysRolesXUser objects filtered by the id_rol column
 * @method array findByIdUser(int $id_user) Return SysRolesXUser objects filtered by the id_user column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysRolesXUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysRolesXUserQuery object.
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
            $modelName = 'SysRolesXUser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysRolesXUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysRolesXUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysRolesXUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysRolesXUserQuery) {
            return $criteria;
        }
        $query = new SysRolesXUserQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$id_rol, $id_user]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SysRolesXUser|SysRolesXUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysRolesXUserPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysRolesXUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysRolesXUser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_rol`, `id_user` FROM `sys_roles_x_user` WHERE `id_rol` = :p0 AND `id_user` = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SysRolesXUser();
            $obj->hydrate($row);
            SysRolesXUserPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SysRolesXUser|SysRolesXUser[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SysRolesXUser[]|mixed the list of results, formatted by the current formatter
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
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SysRolesXUserPeer::ID_ROL, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SysRolesXUserPeer::ID_USER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SysRolesXUserPeer::ID_ROL, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SysRolesXUserPeer::ID_USER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_rol column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRol(1234); // WHERE id_rol = 1234
     * $query->filterByIdRol(array(12, 34)); // WHERE id_rol IN (12, 34)
     * $query->filterByIdRol(array('min' => 12)); // WHERE id_rol >= 12
     * $query->filterByIdRol(array('max' => 12)); // WHERE id_rol <= 12
     * </code>
     *
     * @see       filterBySysRoles()
     *
     * @param     mixed $idRol The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function filterByIdRol($idRol = null, $comparison = null)
    {
        if (is_array($idRol)) {
            $useMinMax = false;
            if (isset($idRol['min'])) {
                $this->addUsingAlias(SysRolesXUserPeer::ID_ROL, $idRol['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRol['max'])) {
                $this->addUsingAlias(SysRolesXUserPeer::ID_ROL, $idRol['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysRolesXUserPeer::ID_ROL, $idRol, $comparison);
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
     * @see       filterBySysUsers()
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(SysRolesXUserPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(SysRolesXUserPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysRolesXUserPeer::ID_USER, $idUser, $comparison);
    }

    /**
     * Filter the query by a related SysUsers object
     *
     * @param   SysUsers|PropelObjectCollection $sysUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysRolesXUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsers($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysRolesXUserPeer::ID_USER, $sysUsers->getIdUser(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysRolesXUserPeer::ID_USER, $sysUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterBySysUsers() only accepts arguments of type SysUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysUsers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function joinSysUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysUsers');

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
            $this->addJoinObject($join, 'SysUsers');
        }

        return $this;
    }

    /**
     * Use the SysUsers relation SysUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysUsersQuery A secondary query class using the current class as primary query
     */
    public function useSysUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysUsers', 'SysUsersQuery');
    }

    /**
     * Filter the query by a related SysRoles object
     *
     * @param   SysRoles|PropelObjectCollection $sysRoles The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysRolesXUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysRoles($sysRoles, $comparison = null)
    {
        if ($sysRoles instanceof SysRoles) {
            return $this
                ->addUsingAlias(SysRolesXUserPeer::ID_ROL, $sysRoles->getIdRol(), $comparison);
        } elseif ($sysRoles instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysRolesXUserPeer::ID_ROL, $sysRoles->toKeyValue('PrimaryKey', 'IdRol'), $comparison);
        } else {
            throw new PropelException('filterBySysRoles() only accepts arguments of type SysRoles or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function joinSysRoles($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysRoles');

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
            $this->addJoinObject($join, 'SysRoles');
        }

        return $this;
    }

    /**
     * Use the SysRoles relation SysRoles object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysRolesQuery A secondary query class using the current class as primary query
     */
    public function useSysRolesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysRoles', 'SysRolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysRolesXUser $sysRolesXUser Object to remove from the list of results
     *
     * @return SysRolesXUserQuery The current query, for fluid interface
     */
    public function prune($sysRolesXUser = null)
    {
        if ($sysRolesXUser) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SysRolesXUserPeer::ID_ROL), $sysRolesXUser->getIdRol(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SysRolesXUserPeer::ID_USER), $sysRolesXUser->getIdUser(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
