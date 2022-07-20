<?php

namespace Sunarc\OrderStatus\Model;

use Magento\Framework\Model\AbstractModel;
use Sunarc\OrderStatus\Api\Data\OrderStatusInterface;
use Sunarc\OrderStatus\Model\ResourceModel\OrderStatus as OrderStatusResource;

class OrderStatus extends AbstractModel implements OrderStatusInterface
{
    public function _construct()
    {
        $this->_init(OrderStatusResource::class);
    }


    /**
     * @return string
     */
    public function getOrderId()
    {
        
        return $this->getData(OrderStatusInterface::ORDER_ID);
    }
    
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(OrderStatusInterface::STATUS);
    }
    
    
    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(OrderStatusInterface::CREATED_AT);
    }


    /**
     * @return string
     */
    public function getUpdatedAt()
   
    {
        return $this->getData(OrderStatusInterface::UPDATED_AT);
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(OrderStatusInterface::ID);
    }


     /**
     * @return string $order_id
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function setOrderId($order_id){
        $this->setData(OrderStatusInterface::ORDER_ID,$order_id);
    }

   
     /**
     * @return string $status
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function setStatus($status){
         $this->setData(OrderStatusInterface::STATUS,$status);
    }


}

?>

