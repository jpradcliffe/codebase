<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputName = trim(filter_input(INPUT_POST, "inputName", FILTER_SANITIZE_STRING));
    $inputDescription = trim(filter_input(INPUT_POST, "inputDescription", FILTER_SANITIZE_STRING));
    $inputCode = htmlspecialchars(trim(filter_input(INPUT_POST, "inputCode")));
    $inputTags = str_replace(" ", "", filter_input(INPUT_POST, "inputTags", FILTER_SANITIZE_STRING));
    $inputTagsSanitized = str_replace(",", " ", $inputTags);
    // form validation
    if($inputName && $inputDescription && $inputCode && $inputTags) {
      // Instanciate new Code object "$code" passing arguments to __construct()
      // "null" is passed as 1st arg because 1st construct() param is $id; which I don't have yet
      // doing this will ensure new object is persisted to db (this is evaluated in construct())
      $code = new Code(null, $inputName, $inputDescription, $inputCode, $inputTagsSanitized);
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
