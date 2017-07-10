<!-- This Mapper Class subscribes to the "Data Mapper Pattern"
*    By seperating the "Model" (CodeSnippet - containing the getters and setters)
*    From the "Data Persistence" (this file - connecting and querying the database)
-->
<?php
class CodeMapper
{
  public function listCode()
  {
    include "config.php";
    $query = "SELECT * FROM codebase_code LIMIT 10";
    try {
    $results = $db->query($query);
    // This FETCH_CLASS mode is cool: it maps columns in table to corresponding properties in the CodeSnippet Class.
    // Which makes it easy to map to the class's getters and setters
    return $results->fetchAll(PDO::FETCH_CLASS, "Code");
    $db = null;
    } catch(Exception $err) {
        throw $err->getMessage();
      }
  }

  public function searchCode($searchArray)
  {
    include "config.php";
    $sql = "SELECT * FROM codebase_code WHERE tags LIKE ";
    foreach($searchArray as $item) {
      $sql .= "'%". $item. "%' AND tags LIKE";
    }
    $query = substr($sql, 0, -14);
    $query .= "LIMIT 10";
    try {
      $results = $db->query($query);
      return $results->fetchAll(PDO::FETCH_CLASS, "Code");
    } catch(Exception $err) {
      echo $err->getMessage();
    }
    $db = null;
  }

  public function addCode($name, $description, $code, $tags)
  {

    include "config.php";
    // persist data to database
    $query = "INSERT INTO codebase_code (name, description, code, tags) VALUES (:name, :description, :code, :tags)";
    try {
      $results = $db->prepare($query);
      $results->bindValue(':name', $name, PDO::PARAM_STR);
      $results->bindValue(':description', $description, PDO::PARAM_STR);
      $results->bindValue(':code', $code, PDO::PARAM_STR);
      $results->bindValue(':tags', $tags, PDO::PARAM_STR);
      $results->execute();
    } catch(Exception $err) {
      echo $err->getMessage();
    }
    $db = null;
  }
}
?>
