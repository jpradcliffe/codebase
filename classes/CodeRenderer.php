<?php

class CodeRenderer
{
    // Render the code "component" i.e. the view the user will see in browser
    public function render($searchArray = null)
    {
      $CodeMapper = new CodeMapper();
      // If $searchArray isn't passed in i'm listing all code items
      if(!$searchArray) {
      $results = $CodeMapper->listCode();
    } else { // if $searchArray is passed in, i'm filtering code items matching $searchArray
      $results = $CodeMapper->searchCode($searchArray);
    }
      $output = "";
      for($i = 0; $i < count($results); $i++) {
        $output .= "<div class=\"panel panel-default\">";
        $output .= "<div class=\"panel-heading\">";
        $output .= "<h5><b>" . $results[$i]->getName() . "</b></h5>";
        $output .= "</div>";
        $output .= "<div class=\"panel-body\">";
        $output .= "<p>" . $results[$i]->getDescription() . "</p>";
        $output .= "<pre>" . $results[$i]->getCode() . "</pre>";
        $output .= "</div>";
        $output .= "</div>";
      }
      return $output;
    }
}

?>
