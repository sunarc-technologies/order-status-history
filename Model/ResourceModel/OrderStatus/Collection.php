<?php

namespace Sunarc\OrderStatus\Model\ResourceModel\OrderStatus;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sunarc\OrderStatus\Model\OrderStatus;
use Sunarc\OrderStatus\Model\ResourceModel\OrderStatus as OrderStatusResource;


class Collection extends AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected function _construct()
	{
		parent::_construct();
		$this->_init(OrderStatus::class, OrderStatusResource::class);
	}
}
?>