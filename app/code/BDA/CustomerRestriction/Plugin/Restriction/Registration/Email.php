<?php

namespace BDA\CustomerRestriction\Plugin\Restriction\Registration;

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
    public function afterGetErrorMessage(\MageKey\CustomerRestriction\Model\Restriction\Registration $subject, $return)
    {
        return $this->helperData->getGeneralConfig('error_message_registration');
    }

}
