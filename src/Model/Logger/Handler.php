<?php
namespace ShipperHQ\Logger\Model\Logger;

use Monolog\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::info;

    /**
     * File name
     * @var string
     */
    protected $fileName = '/var/log/shipperhq.log';
}