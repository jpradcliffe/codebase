<?php
class Code
{
  private $id;
  private $name; // i.e Multi-dimensional array
  private $description; // i.e How to access key - values in Multi-dimensional arrays
  private $code;
  private $tags = []; // i.e. php,arrays,symfony,react,connection,database etc....

  /**
     * Constructor
     */
  // Constructor method sets values when class is instanciated
  public function __construct($id, $name, $description, $code, $tags) {
    $this->id = $id; // I'm not currently using id. Potentially useful when instanciaiting objects using db data
    $this->setName($name);
    $this->setDescription($description);
    $this->setCode($code);
    $this->setTags($tags);
    // Instanciate new CodeMapper object "$mapper" if $id = null i.e it isn't already in the databse
    if(!$id) {
      $mapper = new CodeMapper();
      // Call "addCode" method to persist data to db
      $mapper->addCode($this->name, $this->description, $this->code, $this->tags);
    }
  }

  // Set / Get $Name
  public function setName($name)
  {
    return $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  // Set / Get $Description
  public function setDescription($description)
  {
    return $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  // Set / Get $Code
  public function setCode($code)
  {
    return $this->code = $code;
  }

  public function getCode()
  {
    return $this->code;
  }

  // Set / Get $Tags
  public function setTags($tags)
  {
    return $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }

}
?>
