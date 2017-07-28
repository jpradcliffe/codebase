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
      // This function is cool: it "maps" columns in db as variables which I can then pass
      // into a new Code object.
      function rowMapper($id, $name, $description, $code, $tags){
        return new Code($id, $name, $description, $code, $tags);
      }
      $results = $db->query($query);
      return $results->fetchAll(PDO::FETCH_FUNC, "rowMapper"); // PDO::FETCH_FUNC passes each result to rowMapper()
    } catch(Exception $err) {
      echo $err->getMessage();
    }
    $db = null;
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
      // This function is cool: it "maps" columns in db as variables which I can then pass
      // into a new Code object.
      function rowMapper($id, $name, $description, $code, $tags){
        return new Code($id, $name, $description, $code, $tags);
      }
      $results = $db->query($query);
      return $results->fetchAll(PDO::FETCH_FUNC, "rowMapper"); // PDO::FETCH_FUNC passes each result to rowMapper()
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
