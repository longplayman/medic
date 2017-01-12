<?php

/**
 * Copyright (c) 2015, Мedic Joint.
 * Developed by Softeq Development Corp. for Lomedic S.A..
 */
class Lomedic_SellerCatalog_Block_Rewrite_Adminhtml_Products_Grid extends Webkul_Marketplace_Block_Adminhtml_Products_Grid 
{
    /**
     * Prepare product collection
     * 
     * @return \Lomedic_SellerCatalog_Block_Rewrite_Adminhtml_Products_Grid
     */
    protected function _prepareCollection()
    {
    $collection = Mage::getModel('marketplace/product')->getCollection();
        if($this->getRequest()->getParam('unapp')==1){
            $collection->addFieldToFilter('status', array('neq' => '1'));
        }

        $eavAttribute = new Mage_Eav_Model_Mysql4_Entity_Attribute();
        $pro_att_id = $eavAttribute->getIdByCode("catalog_product","name");
        $collection->getSelect()
            ->join(array("pn" => "catalog_product_entity_varchar"),"pn.entity_id = main_table.mageproductid",array("proname" => "value"))->where("pn.attribute_id = ".$pro_att_id. " AND pn.store_id = ".Mage::app()->getStore()->getStoreId());
        $collection->addFilterToMap("proname","pn.value");

        $collection->getSelect()
            ->join(array("pnn" => "customer_entity"),"pnn.entity_id = main_table.userid",array("fullname" => "email"));
        $collection->addFilterToMap("fullname","pnn.email");

        $this->setCollection($collection);

        parent::_prepareCollection();

        //Modify loaded collection
        foreach ($this->getCollection() as $item) {
            $item->deny = sprintf('<button type="button" class="wk_denyproduct" customer-id ="%s" product-id="%s"><span><span title="Deny">Deny</span></span></button>',$item->getuserid(),$item->getMageproductid());
            $item->prev = sprintf('<span data="%s" product-id="%s" customer-id="%s" title="Click to Review" class="prev btn">prev</span>',$this->getUrl('marketplace/prev/index/id/' .$item->getMageproductid()),$item->getMageproductid(),$item->getuserid());
            $item->entity_id = (int)$item->getmageproductid();
            if(!(is_null($item->getmageproductid())) && $item->getmageproductid() != 0) {
                if($item->getstatus() == 1) {
                    $item->status = sprintf('<a href="%s" title="View product">Approved</a>',
                        $this->getUrl('adminhtml/catalog_product/edit/id/' . $item->getmageproductid())
                    );
                } else {
                    $item->status = sprintf('<a href="%s" title="Click to Approve" onclick="return confirm(\'You sure?\')">Unapproved</a>',$this->getUrl('marketplace/adminhtml_products/approve/id/' . $item->getmageproductid()));
                }
                $product = Mage::getModel('catalog/product')->load($item->getmageproductid());
                $item->price = $product->getPrice();
                $stock_inventory = Mage::getModel('cataloginventory/stock_item')->loadByProduct($item->getmageproductid());
                $item->weight = $product->getWeight();
                $item->qty = $stock_inventory->getQty();
                $item->stock = $stock_inventory->getQty();

                $quantity = Mage::getModel('marketplace/saleslist')->getSalesdetail($item->getmageproductid());
                $item->qty_sold = (int)$quantity['quantitysold'];
                $item->qty_soldconfirmed = (int)$quantity['quantitysoldconfirmed'];
                $symbol=Mage::app()->getLocale()->currency(Mage::app()->getStore()->getCurrentCurrencyCode())->getSymbol();
                $item->qty_soldpending = (int)$quantity['quantitysoldpending'];
                $item->amount_earned = $symbol.$quantity['amountearned'];
                foreach($quantity['clearedat'] as $clear) {
                    if ( isset($clear) && $clear != '0000-00-00 00:00:00' ) {
                        $item->cleared_at = $clear;
                    }
                }
            }
            $product = Mage::getModel('catalog/product')->load($item->getmageproductid());
            $item->proname = $product->getName();

            $customerModel = Mage::getModel('customer/customer')->load($item->getUserid());
            $item->fullname = $customerModel->getEmail();
        }

        return $this;
    }
    
    /**
     * Prepare columns
     */
    protected function _prepareColumns() 
    {
        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('marketplace')->__('ID'),
            'width'     => '50px',
            'index'     => 'entity_id',
            'type'  => 'number',
            'filter_index' => 'main_table.mageproductid'
        ));
        $this->addColumn('customer_name', array(
            'header'    => Mage::helper('marketplace')->__('Customer Name'),
            'index'     => 'fullname',
            'type'  => 'string',
        ));
        $this->addColumn('proname', array(
            'header'    => Mage::helper('marketplace')->__('Name'),
            'index'     => 'proname',
            'type'  => 'string',
        ));
        $this->addColumn('status', array(
            'header'    => Mage::helper('marketplace')->__('Status'),
            'index'     => 'status',
            "type"      => "text",
            "align"     => "center",
            'filter'    => false,
        ));
    }
}