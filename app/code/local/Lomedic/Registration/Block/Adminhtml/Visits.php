<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
class Lomedic_Registration_Block_Adminhtml_Visits extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_visits';
        $this->_blockGroup = 'loregistration';
        $this->_headerText = Mage::helper('loregistration')->__('Visit Manager');
        $this->_headerText = false;
        parent::__construct();
        $this->_removeButton('add');

        $this->setTemplate('registration/grid/container.phtml');

    }
}