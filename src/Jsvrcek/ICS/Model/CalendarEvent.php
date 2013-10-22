<?php

namespace Jsvrcek\ICS\Model;

use Jsvrcek\ICS\Model\Relationship\Organizer;

use Jsvrcek\ICS\Model\Relationship\Attendee;

use Jsvrcek\ICS\Model\CalendarAlarm;
use Jsvrcek\ICS\Exception\CalendarEventException;

class CalendarEvent
{
    /**
     * 
     * @var string $uid
     */
    private $uid;

    /**
     * 
     * @var \DateTime $start
     */
    private $start;

    /**
     * 
     * @var \DateTime $end
     */
    private $end;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $class
     */
    private $class;

    /**
     * @todo add support in CalendarExport
     * 
     * @var \DateTime $created
     */
    private $created;

    /**
     * 
     * @var string $description
     */
    private $description;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $geo
     */
    private $geo;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $lastModified
     */
    private $lastModified;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $location
     */
    private $location;

    /**
     * @todo add support in CalendarExport
     * 
     * @var Organizer $organizaer
     */
    private $organizer;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $priority
     */
    private $priority;

    /**
     * @todo add support in CalendarExport
     * 
     * @var \DateTime $timestamp
     */
    private $timestamp;

    /**
     * @todo add support in CalendarExport
     * 
     * @var string $status
     */
    private $status;

    /**
     * 
     * @var string $summary
     */
    private $summary;

    /**
     * @todo add support in CalendarExport
     * @var string $recuringId
     */
    private $recuringId;
    
    /**
     * 
     * @var array $attendees
     */
    private $attendees = array();
    
    /**
     * 
     * @var array $alarms
     */
    private $alarms = array();

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * also sets end time to 30 minutes after start as default<br>
     * - end time can be overridden with setEnd()
     * 
     * @param \DateTime $start
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;
        $end = clone $start;
        $this->setEnd($end->add(\DateInterval::createFromDateString('30 minutes')));
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setEnd(\DateTime $end)
    {
        //check End is greater than Start
        if ($this->getStart() instanceof \DateTime)
        {
            if ($this->getStart() > $end)
                throw new CalendarEventException('End DateTime must be greater than Start DateTime');
        }
        else
        {
            throw new CalendarEventException('You must set the Start time before setting the End Time of a CalendarEvent');
        }
        
        $this->end = $end;
        return $this;
    }

    /**
     * @return the string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return the string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * @return array $alarms returs array of CalendarAlarm objects
     */
    public function getAlarms()
    {
        return $this->alarms;
    }
    
    /**
     * @param CalendarAlarm $alarm
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function addAlarm(CalendarAlarm $alarm)
    {
        $this->alarms[] = $alarm;
        return $this;
    }
    
    /**
     * @param array $alarms
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setAlarms(array $alarms)
    {
        $this->alarms = $alarms;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * 
     * @param string $class
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * 
     * @param \DateTime $created
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * 
     * @param string $geo
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
        return $this;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * 
     * @param \DateTime $lastModified
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setLastModified(\DateTime $lastModified)
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * 
     * @param string $location
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * 
     * @return Organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * 
     * @param Organizer $organizer
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setOrganizer(Organizer $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * 
     * @param string $priority
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * 
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * 
     * @param \DateTime $timestamp
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setTimestamp(\DateTime $timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 
     * @param string $status
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getRecuringId()
    {
        return $this->recuringId;
    }

    /**
     * 
     * @param string $recuringId
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setRecuringId($recuringId)
    {
        $this->recuringId = $recuringId;
        return $this;
    }

    /**
     * 
     * @return array $attendees array of Attendee objects
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * 
     * @param array $attendees array of Attendee objects
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function setAttendees(array $attendees)
    {
        $this->attendees = $attendees;
    }
    
    /**
     * @param Attendee $attendee
     * @return \Jsvrcek\ICS\Model\CalendarEvent
     */
    public function addAttendee(Attendee $attendee)
    {
        $this->attendees[] = $attendee;
        return $this;
    }
}