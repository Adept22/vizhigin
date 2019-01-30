<?php
class Enrollee {
     private const ENROLLEE_FILE = $_SERVER['DOCUMENT_ROOT'] . '/enrollees.json';
     public $fio = "";
     public $birthday = 0;
     public $school = 0;
     public $articles = array();

     function __construct($_fio, $_birthday, $_school) {
          $this->fio = $_fio;
          $this->birthday = $_birthday;
          $this->school = $_school;
     }

     private function getEnrollees() {
          if(file_exists(ENROLLEE_FILE)) {
               return json_decode(file_get_contents(ENROLLEE_FILE));
          } else {
               throw new Exception("Файл с абитуриентами отсутствует");
          }
     }

     public function addArticle($name, $mark) {
          $this->articles[] = array(
               'name' => $name,
               'mark' => $mark,
          );

          return $this->articles;
     }

     public function write() {
          $enrollees = $this->getEnrollees();
          foreach ($enrollees as $key => $enrollee) {
               if($this->id == $enrollee['id']) return false;
          }

          $enrollees[] = array(
               'fio' => $this->fio,
               'birthday' => $this->birthday,
               'school' => $this->school
          );
     }

     public function writeEnrolleeMarks() {
          $enrollees = $this->getEnrollees();
          foreach ($enrollees as $key => $enrollee) {
               // code...
          }
     }
}

class Mark {
     $
}

if(isset($_GET['name'])) {

}
?>

<!DOCTYPE html>
<html>
     <head>
          <title>Document</title>
     </head>
     <body>
          <form action="/files1.php" method="get" style="width: 300px;">
               <input type="text" name="name" value="" placeholder="ФИО">
               <input type="text" name="birthday" value="" placeholder="Год рождения">
               <input type="text" name="school" value="" placeholder="Год окончания школы">
               <fieldset>
                    <legend>Нуждается в общежитии?</legend>
                    <label for="hostel"><input type="radio" name="hostel" value="Да">Да</label>
                    <label for="hostel"><input type="radio" name="hostel" value="Нет">Нет</label>
               </fieldset>
               <button type="submit">Отправить</button>
          </form>
     <body>
          <form action="/files1.php" method="get" style="width: 300px;">
               <input type="text" name="name" value="" placeholder="ФИО">
               <input type="text" name="birthday" value="" placeholder="Год рождения">
               <input type="text" name="school" value="" placeholder="Год окончания школы">
               <fieldset>
                    <legend>Нуждается в общежитии?</legend>
                    <label for="hostel"><input type="radio" name="hostel" value="Да">Да</label>
                    <label for="hostel"><input type="radio" name="hostel" value="Нет">Нет</label>
               </fieldset>
               <button type="submit">Отправить</button>
          </form>
     </body>
</html>
