<?php

class DirectoryModel
{
    public $id;
    public $name;
    public $size;
    public $type;
    public $lastModified;

    public function save()
    {
        $query = "insert into directory (name, size, type, last_modified) values ('$this->name', '$this->size', '$this->type', '$this->lastModified')";
        $result = getConnection()->prepare($query);
        $result->execute();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $query = "select * from directory";
        $result = getConnection()->prepare($query);
        $result->execute();

        return $result->fetchAll();
    }

    /**
     * @return bool
     */
    public function isTableEmpty()
    {
        $query = "select count(*) from directory";
        $result = getConnection()->prepare($query);
        $result->execute();

        return $result->fetch()[0] == 0;
    }

    /**
     * @return $this
     */
    public function cleanAll()
    {
        $query = "truncate table directory";
        $result = getConnection()->prepare($query);
        $result->execute();

        return $this;
    }
}
