<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
class Lomedic_Registration_Model_Resource_Files_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
        $this->_init('loregistration/files');
    }
}