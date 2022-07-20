<?php  

namespace Sunarc\OrderStatus\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Data\Collection;


 class OrderStatus extends AbstractDb
{
	public function _construct()
	{
		$this->_init('sunarc_orderstatus','entity_id');
	}
}
?>