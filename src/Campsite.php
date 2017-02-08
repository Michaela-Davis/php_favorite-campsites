<?php
class Campsite
{
    private $title;

    function __construct($title)
    {
        $this->title = $title;
    }

    function setTitle($new_title)
    {
        $this->title = (string) $new_title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function save()
    {
        array_push($_SESSION['list_of_campsites'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_campsites'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_campsites'] = array();
    }
}
?>
