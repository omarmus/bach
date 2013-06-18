<?php



/**
 * This class defines the structure of the 'sys_roles_x_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.bach.map
 */
class SysRolesXUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysRolesXUserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sys_roles_x_user');
        $this->setPhpName('SysRolesXUser');
        $this->setClassname('SysRolesXUser');
        $this->setPackage('bach');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_rol', 'IdRol', 'INTEGER' , 'sys_roles', 'id_rol', true, null, null);
        $this->addForeignPrimaryKey('id_user', 'IdUser', 'INTEGER' , 'sys_users', 'id_user', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysUsers', 'SysUsers', RelationMap::MANY_TO_ONE, array('id_user' => 'id_user', ), null, null);
        $this->addRelation('SysRoles', 'SysRoles', RelationMap::MANY_TO_ONE, array('id_rol' => 'id_rol', ), null, null);
    } // buildRelations()

} // SysRolesXUserTableMap
