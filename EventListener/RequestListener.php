<?php

namespace Chaplean\Bundle\AbsenceIoClientBundle\EventListener;

use EightPoints\Bundle\GuzzleBundle\Events\GuzzleEventListenerInterface;
use EightPoints\Bundle\GuzzleBundle\Events\PreTransactionEvent;

/**
 * Class RequestListener.
 *
 * @package   Chaplean\Bundle\AbsenceIoClientBundle\EventListener
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class RequestListener implements GuzzleEventListenerInterface
{
    /**
     * @var string
     */
    protected $serviceName;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $hawkId;

    /**
     * @var string
     */
    protected $hawkKey;

    /**
     * RequestListener constructor.
     *
     * @param string $url
     * @param string $hawkId
     * @param string $hawkKey
     */
    public function __construct($url, $hawkId, $hawkKey)
    {
        $this->url = $url;
        $this->hawkId = $hawkId;
        $this->hawkKey = $hawkKey;
    }

    /**
     * @param $serviceName
     *
     * @return void
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * Injects Hawk Authorization header into requests to absence.io.
     *
     * @param PreTransactionEvent $event
     *
     * @return void
     */
    public function onPreTransaction(PreTransactionEvent $event)
    {
        $request = $event->getTransaction();
        $requestUrl = $request->getUri();

        if (strpos($requestUrl, $this->url) !== 0) {
            return;
        }

        $hawk = \Hawk::generateHeader($this->hawkId, $this->hawkKey, $request->getMethod(), $requestUrl);
        $request = $request->withAddedHeader('Authorization', $hawk);

        $event->setTransaction($request);
    }
}
