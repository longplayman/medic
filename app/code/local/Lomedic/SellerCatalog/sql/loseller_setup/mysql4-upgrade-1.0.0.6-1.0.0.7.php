<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
/**
 * @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'batch_length', array(
    'group'             => 'Batch',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Batch Length',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'unique'            => false,
    'apply_to'          => Lomedic_SellerCatalog_Model_Product_Type::TYPE_BATCH_PRODUCT,
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'batch_height', array(
    'group'             => 'Batch',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Batch Height',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'unique'            => false,
    'apply_to'          => Lomedic_SellerCatalog_Model_Product_Type::TYPE_BATCH_PRODUCT,
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'batch_width', array(
    'group'             => 'Batch',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Batch Width',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'unique'            => false,
    'apply_to'          => Lomedic_SellerCatalog_Model_Product_Type::TYPE_BATCH_PRODUCT,
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'batch_weight', array(
    'group'             => 'Batch',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Batch Weight',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => false,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'unique'            => false,
    'apply_to'          => Lomedic_SellerCatalog_Model_Product_Type::TYPE_BATCH_PRODUCT,
    'is_configurable'   => false,
));
$installer->endSetup();
