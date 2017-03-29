<?php
class renderSearch {
  public static function renderTable ($rows) {

    $table = "
      <table class ='searchT' id=\"searchT\">
      <thead>
        <tr>
           <th>Game</th>
           <th>Platform</th>
           <th>Age</th>
           <th>Note</th>
        </tr>
       </thead>";
    foreach($rows as $row) {
      $table .=
        "<tr>
            <td>" .htmlentities($row['game']) . "</td>
        " ."<td>".htmlentities($row['platform']). "</td>" 
          ."<td>".htmlentities($row['age']). "</td>
            <td>".htmlentities($row['note']). "</td>
        </tr>";
    }
    $table .= "</table>";
    echo $table;
  }
}