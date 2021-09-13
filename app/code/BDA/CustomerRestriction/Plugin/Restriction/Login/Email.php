<?php

namespace BDA\CustomerRestriction\Plugin\Restriction\Login;

class Email
{

    protected $helperData;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \BDA\CustomerRestriction\Helper\Data $helperData
    )
    {
        $this->helperData = $helperData;
    }
    public function beforeGetErrorMessage(\MageKey\CustomerRestriction\Model\Restriction\Login $subject, $title)
    {
        return $this->helperData->getGeneralConfig('error_message_login');
    }
}
