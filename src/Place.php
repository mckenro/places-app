<?php class Place {
    private $cityname;
    private $timethere;
    private $photo;

    function __construct($cityname, $timethere, $photo){
      $this->cityname = $cityname;
      $this->timethere = $timethere;
      $this->photo = $photo;
      }

      function setCities($new_name){
        $this->cityname = (string)$new_name;
      }

      function getCities(){
        return $this->cityname;
      }

      function setTimes(){
        $this->timethere = $timethere;
      }
      function getTimes(){
        return $this->timethere;
      }

      function setPhotos(){
        $this->photo = $photo;
      }
      function getPhotos(){
        return $this->photo;
      }

      function save(){
        array_push($_SESSION['places_list'], $this);
      }

      static function getAll(){
        return $_SESSION['places_list'];
      }
      static function deleteAll(){
        $_SESSION['places_list'] = array();
      }

}
?>
