<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
class Lomedic_SellerCatalog_Model_Resource_Goverment_Catalog extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('loseller/goverment_catalog', 'entity_id');
    }
}