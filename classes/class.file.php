<?php

class File {
    private $name;
    private $size;
    private $mimetype;
    private $icontype;
    private $data_modified;

    /**
     * File constructor.
     * @param $name
     * @param $size
     * @param $mimetype
     * @param $icontype
     * @param $data_modified
     */
    public function __construct($name, $size, $mimetype, $icontype, $data_modified)
    {
        $this->name = $name;
        $this->size = $size;
        $this->mimetype = $mimetype;
        $this->icontype = $icontype;
        $this->data_modified = $data_modified;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * @param mixed $mimetype
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
    }

    /**
     * @return mixed
     */
    public function getIcontype()
    {
        return $this->icontype;
    }

    /**
     * @param mixed $icontype
     */
    public function setIcontype($icontype)
    {
        $this->icontype = $icontype;
    }

    /**
     * @return mixed
     */
    public function getDataModified()
    {
        return $this->data_modified;
    }

    /**
     * @param mixed $data_modified
     */
    public function setDataModified($data_modified)
    {
        $this->data_modified = $data_modified;
    }


}