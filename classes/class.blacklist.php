<?php

class Blacklist {
    private $ip;
    private $mac;
    private $ban_expires;
    private $reason;

    /**
     * Blacklist constructor.
     * @param $ip
     * @param $mac
     * @param $ban_expires
     * @param $reason
     */
    public function __construct($ip, $mac, $ban_expires, $reason)
    {
        $this->ip = $ip;
        $this->mac = $mac;
        $this->ban_expires = $ban_expires;
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param mixed $mac
     */
    public function setMac($mac)
    {
        $this->mac = $mac;
    }

    /**
     * @return mixed
     */
    public function getBanExpires()
    {
        return $this->ban_expires;
    }

    /**
     * @param mixed $ban_expires
     */
    public function setBanExpires($ban_expires)
    {
        $this->ban_expires = $ban_expires;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }



}