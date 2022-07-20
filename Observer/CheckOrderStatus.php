<?php

namespace Sunarc\OrderStatus\Observer;
 
use Magento\Framework\Event\ObserverInterface; 
use Sunarc\OrderStatus\Model\OrderStatusFactory;
use \Magento\Framework\App\Config\ScopeConfigInterface;


class CheckOrderStatus implements ObserverInterface
{

    const CONFIG_PATH_MODULE_ENABLED = 'orderstatus/general/enable';

    protected $scopeConfig;

    protected $orderRepository;


    public function __construct(\Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                OrderStatusFactory $orderStatusFactory,
                                ScopeConfigInterface $scopeConfig) 
    { 
        $this->orderRepository = $orderRepository;
        $this->orderStatusFactory = $orderStatusFactory;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) 
    { 
        if($moduleEnable = $this->getConfigModuleEnabled())
        {
            $order       = $observer->getEvent()->getOrder();
            $customerId  = $order->getCustomerId(); 
            $orderStatus = $order->getStatus();
            $orderIncId  = $order->getIncrementId();
    
            $model = $this->orderStatusFactory->create();
            $model->setOrderId($orderIncId);
            $model->setStatus($orderStatus);
            $model->save();

        }
    
    }

    public function getConfigModuleEnabled()
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_MODULE_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}