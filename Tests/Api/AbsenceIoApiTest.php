<?php

namespace Chaplean\Bundle\AbsenceIoClientBundle\Tests\Api;

use Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi;
use Chaplean\Bundle\RestClientBundle\Api\RequestRoute;
use Chaplean\Bundle\RestClientBundle\Api\Response\Failure\InvalidParameterResponse;
use Chaplean\Bundle\RestClientBundle\Api\Route;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * AbsenceIoApiTest.php.
 *
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class AbsenceIoApiTest extends MockeryTestCase
{
    /**
     * @var \GuzzleHttp\ClientInterface|\Mockery\MockInterface
     */
    private $client;

    /**
     * @var EventDispatcherInterface|\Mockery\MockInterface
     */
    private $eventDispatcher;

    /**
     * @var AbsenceIoApi
     */
    private $api;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->client = \Mockery::mock(ClientInterface::class);
        $this->eventDispatcher = \Mockery::mock(EventDispatcherInterface::class);
        $this->api = new AbsenceIoApi($this->client, $this->eventDispatcher, 'url');

        $this->client->shouldReceive('request')
            ->andReturn(new Response(200));
        $this->eventDispatcher->shouldReceive('dispatch');
    }

    /**
     * @covers  \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::__construct()
     *
     * @return void
     */
    public function testConstruct()
    {
        $this->assertInstanceOf(AbsenceIoApi::class, $this->api);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetRoutes()
    {
        $this->assertInstanceOf(Route::class, $this->api->getAbsence());
        $this->assertInstanceOf(Route::class, $this->api->getAllowanceType());
        $this->assertInstanceOf(Route::class, $this->api->getDeparment());
        $this->assertInstanceOf(Route::class, $this->api->getLocation());
        $this->assertInstanceOf(Route::class, $this->api->getReason());
        $this->assertInstanceOf(Route::class, $this->api->getTeam());
        $this->assertInstanceOf(Route::class, $this->api->getUser());
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostRoutes()
    {
        $this->assertInstanceOf(RequestRoute::class, $this->api->postAbsence());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postAllowanceType());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postDeparment());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postLocation());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postReason());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postTeam());
        $this->assertInstanceOf(RequestRoute::class, $this->api->postUser());
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPutRoutes()
    {
        $this->assertInstanceOf(RequestRoute::class, $this->api->putUser());
        $this->assertInstanceOf(RequestRoute::class, $this->api->putAbsence());
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testBuildApiPrefixIsCorrectlyConfigured()
    {
        $this->assertStringStartsWith('url', $this->api->postAbsence()->getUrl());
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetAbsence()
    {
        $response = $this->api->getAbsence()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetAllowanceType()
    {
        $response = $this->api->getAllowanceType()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetDeparment()
    {
        $response = $this->api->getDeparment()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetLocation()
    {
        $response = $this->api->getLocation()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetReason()
    {
        $response = $this->api->getReason()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testGetTeam()
    {
        $response = $this->api->getTeam()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    public function testGetUser()
    {
        $response = $this->api->getUser()
            ->bindUrlParameters(['id' => 42])
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostAbsenceAllParameters()
    {
        $response = $this->api->postAbsence()
            ->bindRequestParameters(
                [
                    '_id'          => 42,
                    'reasonId'     => 42,
                    'assignedToId' => 42,
                    'approverId '  => 42,
                    'start'        => new \DateTime(),
                    'end'          => new \DateTime(),
                    'commentary'   => 'string',
                    'days'         => ['string1', 'string2'],
                    'daysCount'    => 42,
                    'denyReason'   => 'string',
                    'status'       => 42,
                    'doctorsNote'  => 'string',
                    'substituteId' => 42,
                    'created'      => new \DateTime(),
                    'modified'     => new \DateTime(),
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostAbsenceMinimumParameters()
    {
        $response = $this->api->postAbsence()
            ->bindRequestParameters(
                [
                    'reasonId'     => 42,
                    'assignedToId' => 42,
                    'approverId '  => 42,
                    'start'        => new \DateTime(),
                    'end'          => new \DateTime(),
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostAllowanceTypeAllParameters()
    {
        $response = $this->api->postAllowanceType()
            ->bindRequestParameters(
                [
                    '_id'                    => 42,
                    'active'                 => true,
                    'initialAllowance'       => 42,
                    'name '                  => 'string',
                    'residualLeaveAvailable' => true,
                    'residualLeaveExpires'   => true,
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostAllowanceTypeMinimumParameters()
    {
        $response = $this->api->postAllowanceType()
            ->bindRequestParameters(
                [
                    'active' => true,
                    'name '  => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostDeparmentAllParameters()
    {
        $response = $this->api->postDeparment()
            ->bindRequestParameters(
                [
                    '_id'          => 42,
                    'name'         => 'string',
                    'icsLink'      => 'string',
                    'memberIds '   => [42, 43],
                    'memberCount'  => 42,
                    'approverIds ' => [42, 43],
                    'emailList '   => [
                            [
                                'email'      => 'string',
                                'leaveTypes' => [42, 43]
                            ]
                    ]
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostDeparmentMinimumParameters()
    {
        $response = $this->api->postDeparment()
            ->bindRequestParameters(
                [
                    'name' => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostLocationAllParameters()
    {
        $response = $this->api->postLocation()
            ->bindRequestParameters(
                [
                    '_id'                    => 42,
                    'name'                   => 'string',
                    'icsLink'                => 'string',
                    'memberIds '             => [42, 43],
                    'memberCount'            => 42,
                    'mainLocation'           => true,
                    'inheritHolidays'        => true,
                    'holidayCountryLanguage' => 42,
                    'holidaySubregion'       => 'string',
                    'holidayIds'             => 42,
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostLocationMinimumParameters()
    {
        $response = $this->api->postLocation()
            ->bindRequestParameters(
                [
                    'name'                   => 'string',
                    'inheritHolidays'        => true,
                    'holidayCountryLanguage' => 42,
                    'holidaySubregion'       => 'string',
                    'holidayIds'             => 42,
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostReasonAllParameters()
    {
        $response = $this->api->postReason()
            ->bindRequestParameters(
                [
                    '_id'              => 42,
                    'colorId'          => 42,
                    'allowanceTypeId'  => 42,
                    'isPublic'         => true,
                    'emailList'        => ['string1', 'string2'],
                    'name'             => 'string',
                    'reducesDays'      => 'string',
                    'requiresApproval' => true,
                    'sortIndex'        => 42,
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostReasonMinimumParameters()
    {
        $response = $this->api->postReason()
            ->bindRequestParameters(
                [
                    'colorId'          => 42,
                    'allowanceTypeId'  => 42,
                    'name'             => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostTeamAllParameters()
    {
        $response = $this->api->postTeam()
            ->bindRequestParameters(
                [
                    '_id'              => 42,
                    'name'             => 'string',
                    'emailList'        => ['string1', 'string2'],
                    'inheritHolidays ' => true,
                    'holidayRegion'    => 42,
                    'region'           => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostTeamMinimumParameters()
    {
        $response = $this->api->postTeam()
            ->bindRequestParameters(
                [
                    'name' => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostUserAllParameters()
    {
        $response = $this->api->postUser()
            ->bindRequestParameters(
                [
                    '_id'                    => 42,
                    'role'                   => 42,
                    'status'                 => 42,
                    'email'                  => 'string',
                    'employeeId'             => 'string',
                    'firstName'              => 'string',
                    'lastName'               => 'string',
                    'name'                   => 'string',
                    'roleId'                 => 42,
                    'isApprover'             => true,
                    'language'               => 'string',
                    'departmentId'           => 42,
                    'locationId'             => 42,
                    'teamId'                 => [42, 43],
                    'approverId'             => 42,
                    'avatar'                 => 42,
                    'holidaySubregion'       => 'string',
                    'inheritHolidays'        => true,
                    'holidayCountryLanguage' => 'string',
                    'holidayIds'             => [42, 43],
                    'vacationDays'           => 42,
                    'workingDays'            => ['string1', 'string2'],
                    'notes'                  => 'string',
                    'icsLink'                => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPostUserMinimumParameters()
    {
        $response = $this->api->postUser()
            ->bindRequestParameters(
                [
                    'role'                   => 42,
                    'email'                  => 'string',
                    'firstName'              => 'string',
                    'lastName'               => 'string',
                    'departmentId'           => 42,
                    'locationId'             => 42,
                    'holidaySubregion'       => 'string',
                    'holidayCountryLanguage' => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPutUserAllParameters()
    {
        $response = $this->api->putUser()
            ->bindUrlParameters(
                ['id' => 42]
            )
            ->bindRequestParameters(
                [
                    '_id'                    => 42,
                    'role'                   => 42,
                    'status'                 => 42,
                    'email'                  => 'string',
                    'employeeId'             => 'string',
                    'firstName'              => 'string',
                    'lastName'               => 'string',
                    'name'                   => 'string',
                    'roleId'                 => 42,
                    'isApprover'             => true,
                    'language'               => 'string',
                    'departmentId'           => 42,
                    'locationId'             => 42,
                    'teamId'                 => [42, 43],
                    'approverId'             => 42,
                    'avatar'                 => 42,
                    'holidaySubregion'       => 'string',
                    'inheritHolidays'        => true,
                    'holidayCountryLanguage' => 'string',
                    'holidayIds'             => [42, 43],
                    'vacationDays'           => 42,
                    'workingDays'            => ['string1', 'string2'],
                    'notes'                  => 'string',
                    'icsLink'                => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPutUserMinimumParameters()
    {
        $response = $this->api->putUser()
            ->bindUrlParameters(
                ['id' => 42]
            )
            ->bindRequestParameters(
                [
                    'role'                   => 42,
                    'email'                  => 'string',
                    'firstName'              => 'string',
                    'lastName'               => 'string',
                    'departmentId'           => 42,
                    'locationId'             => 42,
                    'holidaySubregion'       => 'string',
                    'holidayCountryLanguage' => 'string',
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPutAbsenceAllParameters()
    {
        $response = $this->api->putAbsence()
            ->bindUrlParameters(['id' => 42])
            ->bindRequestParameters(
                [
                    '_id'          => 42,
                    'reasonId'     => 42,
                    'assignedToId' => 42,
                    'approverId '  => 42,
                    'start'        => new \DateTime(),
                    'end'          => new \DateTime(),
                    'commentary'   => 'string',
                    'days'         => ['string1', 'string2'],
                    'daysCount'    => 42,
                    'denyReason'   => 'string',
                    'status'       => 42,
                    'doctorsNote'  => 'string',
                    'substituteId' => 42,
                    'created'      => new \DateTime(),
                    'modified'     => new \DateTime(),
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\Api\AbsenceIoApi::buildApi()
     *
     * @return void
     */
    public function testPutAbsenceMinimumParameters()
    {
        $response = $this->api->putAbsence()
            ->bindUrlParameters(['id' => 42])
            ->bindRequestParameters(
                [
                    'reasonId'     => 42,
                    'assignedToId' => 42,
                    'approverId '  => 42,
                    'start'        => new \DateTime(),
                    'end'          => new \DateTime(),
                ]
            )
            ->exec();

        $this->assertNotInstanceOf(InvalidParameterResponse::class, $response);
    }
}
