<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
$installer = $this;
$installer->startSetup();
$config = Mage::getModel('core/config');
$customerGrouprs = array('privateseller'=>'Seller/Private sector','govseller'=>'Seller/Government sector','privatebuyer'=>'Buyer/Private sector','govbuyer'=>'Buyer/Government sector');
$taxModel = Mage::getModel('tax/class');
$groupModel = Mage::getModel('customer/group');
$taxClass = $taxModel->load('Lomedic Tax Class','class_name');
if(!$taxClass->getId()) {
    $taxModel->setClassType(Mage_Tax_Model_Class::TAX_CLASS_TYPE_CUSTOMER)
         ->setClassName('Lomedic Tax Class');
    $taxClass = $taxModel->save();
}

foreach ($customerGrouprs as $key=>$val) {
    if(Mage::getStoreConfig('softeq/loregistration/'.$key)) 
            continue;
    
    $groupModel->setId(null)
            ->setCustomerGroupCode($val)
            ->setTaxClassId($taxClass->getClassId())
            ->save();
            $config->saveConfig('softeq/loregistration/'.$key, $groupModel->getCustomerGroupId(), 'default', 0);
}

$installer->endSetup();