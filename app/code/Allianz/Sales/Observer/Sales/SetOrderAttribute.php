<?php

namespace Allianz\Sales\Observer\Sales;


class SetOrderAttribute implements \Magento\Framework\Event\ObserverInterface

{
    protected $productRepository;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        $this->logger = $logger;
        $this->productRepository = $productRepository;
    }


    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order= $observer->getData('order');
        $order->setCustomAttribute("Yes");
        $order->save();
    }
}
