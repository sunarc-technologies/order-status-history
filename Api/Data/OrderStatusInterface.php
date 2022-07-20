<?php

namespace Sunarc\OrderStatus\Api\Data;

//create Data Interface
interface OrderStatusInterface
{
    const ID = "entity_id";
    const ORDER_ID = "order_id";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    
    /** 
     * @return int
     */
    public function getId();

    /** 
     * @return string
     */
    public function getOrderId();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return string 
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param int $id
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function setId($id);

    /**
     * @return string $order_id
     * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
     */
    public function setOrderId($order_id);

    /**
    * @return string $status
    * @return \Sunarc\OrderStatus\Api\Data\OrderStatusInterface
    */
    public function setStatus($status);


}
?>