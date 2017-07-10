<?php
class Code
{
  private $id;
  private $name; // i.e Multi-dimensional array
  private $description; // i.e How to access key - values in Multi-dimensional arrays
  private $code;
  private $tags = []; // i.e. php,arrays,symfony,react,connection,database etc....

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
