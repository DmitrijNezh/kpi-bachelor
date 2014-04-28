<?php

abstract class DataHandler
{
    protected $filePath;
    protected $mapId;

    public function __construct($filePath, $mapId)
    {
        $this->filePath = $filePath;
        $this->mapId = $mapId;
    }

    public function handle() {}
}