<?php
namespace Zarpo\ProductsMaps\Block;
use Magento\Framework\View\Element\Template;

class Main extends Template
{    

    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,        
        array $data = []
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;    
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
    
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToFilter('type_id', 'configurable');
        return $collection;
    }    
}
