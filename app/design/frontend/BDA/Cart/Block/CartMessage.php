<?php

namespace BDA\Cart\Block;

use Magento\Framework\View\Element\Template;

class CartMessage extends Template
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    protected $cart;

    const CART_ENABLED_CONFIG_PATH = 'BDA_Cart/general/enabled';
    const CART_MESSAGE_CONFIG_PATH = 'BDA_Cart/general/title';

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Cart $cart,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->cart = $cart;
    }

    public function getCartMessage()
    {
        //check if cart is empty
        if (count($this->cart->getQuote()->getAllItems()) === 0) {
            if ($this->is_enabled() == true) {
                return $this->message();
            }
        }
        return false;
    }

    protected function is_enabled()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::CART_ENABLED_CONFIG_PATH, $storeScope);
    }

    protected function message()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::CART_MESSAGE_CONFIG_PATH, $storeScope);
    }
}
