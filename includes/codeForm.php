<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputName = trim(filter_input(INPUT_POST, "inputName", FILTER_SANITIZE_STRING));
    $inputDescription = trim(filter_input(INPUT_POST, "inputDescription", FILTER_SANITIZE_STRING));
    $inputCode = trim(filter_input(INPUT_POST, "inputCode", FILTER_SANITIZE_STRING));
    $inputTags = str_replace(" ", "", filter_input(INPUT_POST, "inputTags", FILTER_SANITIZE_STRING));
    $inputTagsFinal = str_replace(",", " ", $inputTags);
    // form validation
    if($inputName && $inputDescription && $inputCode && $inputTags) {
    // Passing user input to setters
    $setter = new Code();
    $name = $setter->setName($inputName);
    $description = $setter->setDescription($inputDescription);
    $code = $setter->setCode($inputCode);
    $tags = $setter->setCode($inputTagsFinal);
    // Passing "set" input to CodeMapper->addCode() to persist data to db
    $mapper = new CodeMapper();
    $mapper->addCode($name, $description, $code, $tags);
    } else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">All fields required</div>";
    }
  }
?>
<form action="/" method="post">
  <div class="form-group">
    <label for="inputName">Name:</label>
      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Short description..." />
  </div>
  <div class="form-group">
    <label for="inputDescription">Description:</label>
      <textarea class="form-control" id="inputDescription" name="inputDescription" placeholder="Detailed description..."></textarea>
  </div>
  <div class="form-group">
    <label for="inputCode">Code:</label>
      <textarea class="form-control" rows="10" id="inputCode" name="inputCode" placeholder="Paste code here..."></textarea>
  </div>
    <div class="form-group">
      <label for="inputTags">Tags (lower case, seperated by commas):</label>
        <input type="text" class="form-control" id="inputTags" name="inputTags" placeholder="Tags..." />
    </div>
    <button type="submit" class="btn btn-success" id="submit" name="submit">Save it!</button>
</form>
