<?php
 
namespace Sunarc\OrderStatus\Block\Adminhtml\Order\View\Tab;
 
class OrderStatusTab extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_template = 'Sunarc_OrderStatus::order/view/tab/orderstatus.phtml';
    /**
     * @var \Magento\Framework\Registry
     */
    private $_coreRegistry;
 
    /**
     * View constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Sunarc\OrderStatus\Model\OrderStatusFactory $OrderStatus,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry             $registry,
        array                                   $data = []
    )
    {
        $this->_coreRegistry = $registry;
        $this->timezone = $timezone;
        $this->OrderStatus = $OrderStatus;
        parent::__construct($context, $data);
    }
    

    public function getOrderStatus()
    {        
        $orderId = $this->getOrderIncrementId();
        $getStatus = $this->OrderStatus->create();
        $collection = $getStatus->getCollection();
        
        $data = $collection->addFieldToFilter('order_id',$orderId);

        return $data;
    }

    public function StatusDateFormat($date)
    { 
        $created = $date;
        $created = $this->timezone->date(new \DateTime($created));
        $dateAndTime = $created->format('M j, Y g:i:s A');

        return $dateAndTime;

    }

    public function StatusLable($status)
    {
        
        return $this->getOrder()->getConfig()->getStatusLabel($status);
      
    }
    /**
     * Retrieve order model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }
 
    /**
     * Retrieve order model instance
     *
     * @return int
     *Get current id order
     */
    public function getOrderId()
    {
        return $this->getOrder()->getEntityId();
    }
 
    /**
     * Retrieve order increment id
     *
     * @return string
     */
    public function getOrderIncrementId()
    {
        return $this->getOrder()->getIncrementId();
    }
 
    /**
     * Retrieve order increment id
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->getOrder()->getCustomerEmail();
    }
 
    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Order Status History');
    }
 
    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Order Status History');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}