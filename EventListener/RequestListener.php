<?php
/*
 *
 * This file is part of the AbsenceIoClientBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chaplean\Bundle\AbsenceIoClientBundle\EventListener;

use Dflydev\Hawk\Client\ClientBuilder;
use Dflydev\Hawk\Credentials\Credentials;
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

        $credentials = new Credentials($this->hawkKey, 'sha256', $this->hawkId);
        $client = ClientBuilder::create()->build();
        $hawkRequest = $client->createRequest($credentials, $requestUrl, $request->getMethod());
        $hawk = $hawkRequest->header()->fieldValue();
        $request = $request->withAddedHeader('Authorization', $hawk);

        $event->setTransaction($request);
    }
}
