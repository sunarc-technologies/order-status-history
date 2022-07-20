<?php

namespace Sunarc\OrderStatus\Api; 

use Magento\Framework\Api\Search\SearchCriteriaInterface;

//create Service Interface
interface OrderStatusRepositoryInterface
{
    

    /**
     * @param string $order_id
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function getOrderStatusById($order_id);

    

}
?>