<?php

namespace Sunarc\OrderStatus\Model;

use Sunarc\OrderStatus\Api\OrderStatusRepositoryInterface;
use Sunarc\OrderStatus\Model\ResourceModel\OrderStatus\CollectionFactory;
use Sunarc\OrderStatus\Model\OrderStatusFactory;
use Sunarc\OrderStatus\Model\ResourceModel\OrderStatus;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor; //class for searching,sorting,pagination 


class OrderStatusRepository implements OrderStatusRepositoryInterface
{
    private $collectionFactory;
    private $orderStatusFactory;
    private $orderStatus;
    private $collectionProcessor;

    public function __construct(CollectionFactory $collectionFactory, 
    OrderStatus $orderStatus,OrderStatusFactory $orderStatusFactory, CollectionProcessor $collectionProcessor)
    {
        $this->collectionFactory = $collectionFactory;
        $this->orderStatusFactory = $orderStatusFactory;
        $this->orderStatus = $orderStatus;
        $this->collectionProcessor = $collectionProcessor;
    }

    

    /**
     * @param string $order_id
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function getOrderStatusById($order_id)
    {
        return $this->orderStatusFactory->create()->getCollection()->addFieldToFilter('order_id',$order_id)->getData();
    }

}

?>