<?php

namespace Chaplean\Bundle\AbsenceIoClientBundle\Api;

use Chaplean\Bundle\ApiClientBundle\Api\AbstractApi;
use Chaplean\Bundle\ApiClientBundle\Api\Parameter;
use GuzzleHttp\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * AbsenceIoApi.php.
 *
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class AbsenceIoApi extends AbstractApi
{
    /**
     * @var string
     */
    protected $url;

    /**
     * Absence constructor.
     *
     * @param ClientInterface          $caller
     * @param EventDispatcherInterface $eventDispatcher
     * @param string                   $url
     */
    public function __construct(ClientInterface $caller, EventDispatcherInterface $eventDispatcher, $url)
    {
        $this->url = $url;

        parent::__construct($caller, $eventDispatcher);
    }

    /**
     * Set api actions.
     *
     * @return void
     */
    public function buildApi()
    {
        $this->globalParameters()
            ->urlPrefix($this->url)
            ->expectsJson();

        $this->get('absence', 'absences/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::string()
                ]
            );

        $this->post('searchAbsence', 'absences')
            ->requestParameters(
                [
                    'skip'  => Parameter::int(),
                    'limit' => Parameter::int()
                ]
            );

        $this->post('absence', 'absences/create')
            ->requestParameters(
                [
                    '_id'          => Parameter::id()
                        ->optional(),
                    'reasonId'     => Parameter::id(),
                    'assignedToId' => Parameter::id(),
                    'approverId '  => Parameter::id(),
                    'start'        => Parameter::dateTime(),
                    'end'          => Parameter::dateTime(),
                    'commentary'   => Parameter::string()
                        ->optional(),
                    'days'         => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'daysCount'    => Parameter::int()
                        ->optional(),
                    'denyReason'   => Parameter::string()
                        ->optional(),
                    'status'       => Parameter::int()
                        ->optional(),
                    'doctorsNote'  => Parameter::string()
                        ->optional(),
                    'substituteId' => Parameter::id()
                        ->optional(),
                    'created'      => Parameter::dateTime()
                        ->optional(),
                    'modified'     => Parameter::dateTime()
                        ->optional(),
                ]
            );

        $this->put('absence', 'absences/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            )
            ->requestParameters(
                [
                    '_id'          => Parameter::id()
                        ->optional(),
                    'reasonId'     => Parameter::id(),
                    'assignedToId' => Parameter::id(),
                    'approverId '  => Parameter::id(),
                    'start'        => Parameter::dateTime(),
                    'end'          => Parameter::dateTime(),
                    'commentary'   => Parameter::string()
                        ->optional(),
                    'days'         => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'daysCount'    => Parameter::int()
                        ->optional(),
                    'denyReason'   => Parameter::string()
                        ->optional(),
                    'status'       => Parameter::int()
                        ->optional(),
                    'doctorsNote'  => Parameter::string()
                        ->optional(),
                    'substituteId' => Parameter::id()
                        ->optional(),
                    'created'      => Parameter::dateTime()
                        ->optional(),
                    'modified'     => Parameter::dateTime()
                        ->optional(),
                ]
            );

        $this->get('allowancetype', 'allowancetypes/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            );

        $this->post('allowancetype', 'allowancetypes')
            ->requestParameters(
                [
                    '_id'                    => Parameter::id()
                        ->optional(),
                    'active'                 => Parameter::bool(),
                    'initialAllowance'       => Parameter::int()
                        ->optional(),
                    'name '                  => Parameter::string(),
                    'residualLeaveAvailable' => Parameter::bool()
                        ->optional(),
                    'residualLeaveExpires'   => Parameter::bool()
                        ->optional(),
                ]
            );

        $this->get('deparment', 'deparments/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            );

        $this->post('deparment', 'deparments')
            ->requestParameters(
                [
                    '_id'          => Parameter::id()
                        ->optional(),
                    'name'         => Parameter::string(),
                    'icsLink'      => Parameter::string()
                        ->optional(),
                    'memberIds '   => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'memberCount'  => Parameter::int()
                        ->optional(),
                    'approverIds ' => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'emailList '   => Parameter::arrayList(
                        Parameter::object(
                            [
                                'email'      => Parameter::string(),
                                'leaveTypes' => Parameter::arrayList(Parameter::id())
                                    ->optional()
                            ]
                        )
                    )
                        ->optional(),
                ]
            );

        $this->get('location', 'locations/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            );

        $this->post('location', 'locations')
            ->requestParameters(
                [
                    '_id'                    => Parameter::id()
                        ->optional(),
                    'name'                   => Parameter::string(),
                    'icsLink'                => Parameter::string()
                        ->optional(),
                    'memberIds '             => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'memberCount'            => Parameter::int()
                        ->optional(),
                    'mainLocation'           => Parameter::bool()
                        ->optional(),
                    'inheritHolidays'        => Parameter::bool(),
                    'holidayCountryLanguage' => Parameter::id(),
                    'holidaySubregion'       => Parameter::string(),
                    'holidayIds'             => Parameter::id(),
                ]
            );

        $this->get('reason', 'reasons/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::string()
                ]
            );

        $this->post('reason', 'reasons')
            ->requestParameters(
                [
                    '_id'              => Parameter::id()
                        ->optional(),
                    'colorId'          => Parameter::id(),
                    'allowanceTypeId'  => Parameter::id(),
                    'isPublic'         => Parameter::bool()
                        ->optional(),
                    'emailList'        => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'name'             => Parameter::string(),
                    'reducesDays'      => Parameter::string()
                        ->optional(),
                    'requiresApproval' => Parameter::bool()
                        ->optional(),
                    'sortIndex'        => Parameter::int()
                        ->optional(),
                ]
            );

        $this->get('team', 'teams/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            );

        $this->post('team', 'teams')
            ->requestParameters(
                [
                    '_id'              => Parameter::id()
                        ->optional(),
                    'name'             => Parameter::string(),
                    'emailList'        => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'inheritHolidays ' => Parameter::bool()
                        ->optional(),
                    'holidayRegion'    => Parameter::id()
                        ->optional(),
                    'region'           => Parameter::string()
                        ->optional(),
                ]
            );

        $this->get('user', 'user/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            );

        $this->post('user', 'user')
            ->requestParameters(
                [
                    '_id'                    => Parameter::id()
                        ->optional(),
                    'role'                   => Parameter::id(),
                    'status'                 => Parameter::int()
                        ->optional(),
                    'email'                  => Parameter::string(),
                    'employeeId'             => Parameter::string()
                        ->optional(),
                    'firstName'              => Parameter::string(),
                    'lastName'               => Parameter::string(),
                    'name'                   => Parameter::string()
                        ->optional(),
                    'roleId'                 => Parameter::id()
                        ->optional(),
                    'isApprover'             => Parameter::bool()
                        ->optional(),
                    'language'               => Parameter::string()
                        ->optional(),
                    'departmentId'           => Parameter::id(),
                    'locationId'             => Parameter::id(),
                    'teamId'                 => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'approverId'             => Parameter::id()
                        ->optional(),
                    'avatar'                 => Parameter::id()
                        ->optional(),
                    'holidaySubregion'       => Parameter::string(),
                    'inheritHolidays'        => Parameter::bool()
                        ->optional(),
                    'holidayCountryLanguage' => Parameter::string(),
                    'holidayIds'             => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'vacationDays'           => Parameter::int()
                        ->optional(),
                    'workingDays'            => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'notes'                  => Parameter::string()
                        ->optional(),
                    'icsLink'                => Parameter::string()
                        ->optional(),
                ]
            );

        $this->put('user', 'user/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::id()
                ]
            )
            ->requestParameters(
                [
                    '_id'                    => Parameter::id()
                        ->optional(),
                    'role'                   => Parameter::id(),
                    'status'                 => Parameter::int()
                        ->optional(),
                    'email'                  => Parameter::string(),
                    'employeeId'             => Parameter::string()
                        ->optional(),
                    'firstName'              => Parameter::string(),
                    'lastName'               => Parameter::string(),
                    'name'                   => Parameter::string()
                        ->optional(),
                    'roleId'                 => Parameter::id()
                        ->optional(),
                    'isApprover'             => Parameter::bool()
                        ->optional(),
                    'language'               => Parameter::string()
                        ->optional(),
                    'departmentId'           => Parameter::id(),
                    'locationId'             => Parameter::id(),
                    'teamId'                 => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'approverId'             => Parameter::id()
                        ->optional(),
                    'avatar'                 => Parameter::id()
                        ->optional(),
                    'holidaySubregion'       => Parameter::string(),
                    'inheritHolidays'        => Parameter::bool()
                        ->optional(),
                    'holidayCountryLanguage' => Parameter::string(),
                    'holidayIds'             => Parameter::arrayList(Parameter::id())
                        ->optional(),
                    'vacationDays'           => Parameter::int()
                        ->optional(),
                    'workingDays'            => Parameter::arrayList(Parameter::string())
                        ->optional(),
                    'notes'                  => Parameter::string()
                        ->optional(),
                    'icsLink'                => Parameter::string()
                        ->optional(),
                ]
            );
    }
}
