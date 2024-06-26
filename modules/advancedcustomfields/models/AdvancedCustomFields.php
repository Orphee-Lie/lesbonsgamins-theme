<?php
/**
*
*
*    Advanced Custom Fields
*    Copyright 2018  Inno-mods.io
*
*    @author    Inno-mods.io
*    @copyright Inno-mods.io
*    @version   1.5
*    Visit us at http://www.inno-mods.io
*
*
**/

class AdvancedCustomFieldsModel extends ObjectModel
{


    /*
    * definition
    */
    public $id_custom_field;
    public $name;
    public $technical_name;
    public $type;
    public $required;
    public $active;
    public $display_frontend;
    public $display_label_frontend;
    public $editable_frontend;
    public $translatable;
    public $available_values;
    public $default_value;
    public $single_label;
    public $allow_empty_select;
    public $default_status;
    public $location;
    public $admin_hook;
    public $description;
    public $position;


    public static $definition = array(
                                        'table' => 'advanced_custom_fields',
                                        'primary' => 'id_custom_field',
                                        'multishop' => true,
                                        'multilang' => true,
                                        'fields' => array(
                                                            'name' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'lang' => true,
                                                                        'validate' => 'isString',
                                                                        'required' => true
                                                                        ),
                                                            'technical_name' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'required' => true
                                                                        ),
                                                            'type' => array(
                                                                            'type' => self::TYPE_HTML,
                                                                            'validate' => 'isString',
                                                                            'required' => true
                                                                        ),
                                                            'required' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                            'required' => true
                                                                        ),
                                                            'active' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                            'required' => true
                                                                        ),
                                                            'display_frontend' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                            'required' => true
                                                                        ),
                                                            'display_label_frontend' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                            'required' => true
                                                                        ),
                                                            'editable_frontend' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                        ),
                                                            'translatable' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                            //'required' => true
                                                                        ),
                                                            'location' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'required' => true
                                                                        ),
                                                            'admin_hook' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        ),
                                                            'available_values' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'lang' => true
                                                                        ),
                                                            'default_value' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'lang' => true
                                                                        ),
                                                            'single_label' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'lang' => true
                                                                        ),
                                                            'allow_empty_select' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                        ),
                                                            'default_status' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                        ),
                                                            'description' => array(
                                                                        'type' => self::TYPE_HTML,
                                                                        'validate' => 'isString',
                                                                        'lang' => true
                                                                        ),
                                                            'position' => array(
                                                                            'type' => self::TYPE_INT,
                                                                            'validate' => 'isUnsignedInt',
                                                                        ),



                                                        ),
                                    );


    /*
    * createSchema for current Model
    */
    public static function createSchema()
    {
        return ( AdvancedCustomFieldsModel::createAdvancedCustomFieldsTable() &&
                 AdvancedCustomFieldsModel::createAdvancedCustomFieldsLanguageTable() &&
                 AdvancedCustomFieldsModel::createAdvancedCustomFieldsShopRelationTable());
    }




    /*
    * dropSchema for current Model
    */
    public static function dropSchema()
    {
        $sql = 'DROP TABLE `'._DB_PREFIX_.self::$definition['table'].'`,
                           `'._DB_PREFIX_.self::$definition['table'].'_lang`,
                           `'._DB_PREFIX_.self::$definition['table'].'_shops`';
        $result = Db::getInstance()->execute($sql);
        return $result;
    }




    /*
    * createConfigurationTable
    */
    public static function createAdvancedCustomFieldsTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.self::$definition['table'].'`(
                `id_custom_field` int(10) unsigned NOT NULL auto_increment,
                `technical_name` text NOT NULL,
                `type` text NOT NULL,
                `required` int(10) unsigned NOT NULL,
                `active` int(10) unsigned NOT NULL,
                `display_frontend` int(10) unsigned NOT NULL,
                `display_label_frontend` int(10) unsigned NOT NULL,
                `editable_frontend` int(10) unsigned NOT NULL,
                `translatable` int(10) unsigned NOT NULL,
                `allow_empty_select` int(10) unsigned NOT NULL,
                `default_status` int(10) unsigned NOT NULL,
                `location` text NOT NULL,
                `admin_hook` text NOT NULL,
                `position` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_custom_field`)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }

    /*
    * createAdvancedCustomFieldsLanguageTable
    */
    public static function createAdvancedCustomFieldsLanguageTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.self::$definition['table'].'_lang` (
                      `id_custom_field` int(10) unsigned NOT NULL,
                      `id_lang` int(10) unsigned NOT NULL,
                      `name` text NOT NULL,
                      `description` text NOT NULL,
                      `available_values` text NOT NULL,
                      `default_value` text NOT NULL,
                      `single_label` text NOT NULL,
                      PRIMARY KEY (`id_custom_field`,`id_lang`)
                    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }




    /*
    * createAdvancedCustomFieldsShopRelationTable
    */
    public static function createAdvancedCustomFieldsShopRelationTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.self::$definition['table'].'_shops` (
                      `id_custom_field` int(10) unsigned NOT NULL,
                      `id_shop` int(10) unsigned NOT NULL,
                      PRIMARY KEY (`id_custom_field`,`id_shop`)
                    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        return Db::getInstance()->execute($sql);
    }






    /*
    * getLocationCustomFields
    */
    public static function getCustomFieldShops($ID)
    {
        // ask database
        $sql = 'SELECT `cf`.`id_custom_field` , `rel`.`id_shop`
                FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
                LEFT JOIN `'._DB_PREFIX_.self::$definition['table'].'_shops` as `rel` ON `rel`.`id_custom_field` = `cf`.`id_custom_field`
                WHERE `cf`.`id_custom_field` = "'.$ID.'" ';
        $res = Db::getInstance()->ExecuteS($sql);
        if ($res) {
            // prepare result
            foreach ($res as $row) {
                $shops[] = $row['id_shop'];
            }
        }
        // return result
        return $shops;
    }



    /*
    * clearCustomFieldShops
    */
    public static function checkForCustomFieldInShop($ID, $shop){
        // ask database
        $sql = 'SELECT `cf`.`id_custom_field` , `rel`.`id_shop`
                FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
                LEFT JOIN `'._DB_PREFIX_.self::$definition['table'].'_shops` as `rel` ON `rel`.`id_custom_field` = `cf`.`id_custom_field`
                WHERE `cf`.`id_custom_field` = "'.$ID.'" AND `rel`.`id_shop` = '.$shop.' ';
        $res = Db::getInstance()->ExecuteS($sql);
        if ($res) {
            return true;
        }
        else {
            return false;
        }
    }


    /*
    * clearCustomFieldShops
    */
    public static function clearCustomFieldShops($ID)
    {
        $sql = 'DELETE FROM `'._DB_PREFIX_.self::$definition['table'].'_shops` WHERE `id_custom_field` = "'.(int)$ID.'" ';
        return Db::getInstance()->Execute($sql);
    }



    /*
    * relToStore
    */
    public static function relCustomFieldToShop($id_custom_field, $shop_id)
    {
        $sql = 'INSERT INTO `'._DB_PREFIX_.self::$definition['table'].'_shops` ( `id_custom_field` , `id_shop` ) VALUES ( "'.(int)$id_custom_field.'" , "'.(int)$shop_id.'")  ';
        return Db::getInstance()->Execute($sql);
    }



    /*
    * getLocationCustomFields
    */
    public static function getLocationCustomFields($shops, $location, $languageID, $hook = null)
    {
        // init empty array
        $customFields = array();
        // if hook available (for products), prepare sql query
        if ($hook){
            $hookSql = 'AND `cf`.`admin_hook` LIKE "'.$hook.'"';
        } else {
            $hookSql = '';
        }
        // foreach shop in context
        foreach ($shops as $key => $value) {


        }

        // ask database
        $sql = 'SELECT `cf`.* , `l`.*
                FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
                LEFT JOIN `'._DB_PREFIX_.self::$definition['table'].'_lang` as `l` ON `l`.`id_custom_field` = `cf`.`id_custom_field`
                LEFT JOIN `'._DB_PREFIX_.self::$definition['table'].'_shops` as `s` ON `s`.`id_custom_field` = `cf`.`id_custom_field`
                WHERE `s`.`id_shop` IN ( '.join(',',$shops).') AND `cf`.`location` = "'.$location.'" AND `l`.`id_lang` = "'.$languageID.'" '.$hookSql.' GROUP BY `cf`.`id_custom_field` ORDER BY `position` ';

        $res = Db::getInstance()->ExecuteS($sql);
        if ($res) {
            // prepare result
            foreach ($res as $row) {
                $customFields[] = $row;
            }
        }
        // return result
        return $customFields;
    }


    /*
    * getCustomFieldFromTechnicalName
    */
    public static function getCustomFieldFromTechnicalName($technical_name, $languageID)
    {
        // init empty array
        $customFields = array();
        // ask database
        $sql = 'SELECT `cf`.* , `l`.*
                FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
                LEFT JOIN `'._DB_PREFIX_.self::$definition['table'].'_lang` as `l` ON `l`.`id_custom_field` = `cf`.`id_custom_field`
                WHERE `cf`.`technical_name` = "'.$technical_name.'" AND `l`.`id_lang` = "'.$languageID.'"  LIMIT 1';
        $res = Db::getInstance()->ExecuteS($sql);
        if ($res) {
            // return result
            return $res[0];
        }
        // return
        return ;
    }


    /*
    * getCustomFieldIdFromTechnicalName
    */
    public static function getCustomFieldIdFromTechnicalName($technical_name)
    {
        // init empty array
        $customFields = array();
        // ask database
        $sql = 'SELECT `cf`.`id_custom_field`
                FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
                WHERE `cf`.`technical_name` = "'.$technical_name.'"  LIMIT 1';
        $res = Db::getInstance()->ExecuteS($sql);
        if ($res) {
            // return result
            return $res[0]['id_custom_field'];
        }
        // return
        return ;
    }



    /*
    * checkIfTechnicalNameExists
    */
    public static function checkIfTechnicalNameExists($technical_name, $excludeID = '')
    {
      // if an id should be excluded
      if ($excludeID != ''){
          $excludeSql = ' AND `cf`.`id_custom_field` != "'.$excludeID.'"';
      } else {
          $excludeSql = '';
      }

      // ask database
      $sql = 'SELECT `cf`.`id_custom_field`
              FROM `'._DB_PREFIX_.self::$definition['table'].'` as `cf`
              WHERE `cf`.`technical_name` = "'.$technical_name.'" '.$excludeSql.' LIMIT 1';
      $res = Db::getInstance()->ExecuteS($sql);
      if ($res) {
          // return result
          return true;
      }
      // return
      return false;
    }


    /*
    * isTechnicalName
    */
    static public function isTechnicalName($technical_name)
    {
        if (preg_match('/^[_a-z0-9]+$/ui', $technical_name)){
            return true;
        } else {
            return false;
        }
    }


    /*
    * deleteCustomField
    */
    public static function deleteCustomField($customFieldID)
    {
        // clear main table
        $sql = 'DELETE FROM `'._DB_PREFIX_.self::$definition['table'].'` WHERE `id_custom_field` = "'.(int)$customFieldID.'" ';
        Db::getInstance()->Execute($sql);
        // clear lang table
        $sql = 'DELETE FROM `'._DB_PREFIX_.self::$definition['table'].'_lang` WHERE `id_custom_field` = "'.(int)$customFieldID.'" ';
        Db::getInstance()->Execute($sql);
        // return
        return;
    }


    /*
    * End of File
    */
}
