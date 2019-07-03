<?php
/**
 * Created by PhpStorm.
 * User: uho0613
 * Date: 03.07.19
 * Time: 18:19
 */

namespace SysPerson\Practic\Api;
use Magento\Framework\Event\ObserverInterface;

interface MyObserverInterface extends ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer);
}