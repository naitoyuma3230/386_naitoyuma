<?php

require 'Calendar.php';

function h($s){
  return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

$cal = new \MyApp\Calendar();



?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>calendar</title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th><a href="/?t=<?php echo h($cal-$prev); ?>">&laquo;</a></th>
          <th colspan="5"><?php echo h($cal->yearMonth); ?> </th>
          <th><a href="/?t=<?php echo h($cal->next); ?>">&raquo;</a></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sun</td>
          <td>Mon</td>
          <td>The</td>
          <td>Wed</td>
          <td>Thu</td>
          <td>Fri</td>
          <td>Sat</td>
        </tr>
      </tbody>
      <tbody>
        <?php echo $cal->show(); ?>
          <!-- <td class="youbi_0">1</td>
          <td class="youbi_1">2</td>
          <td class="youbi_2">3</td>
          <td class="youbi_3">4</td>
          <td class="youbi_4 today">5</td>
          <td class="youbi_5">6</td>
          <td class="youbi_6">7</td> -->
      </tbody>
      <tbody>
        <tr>
          <!-- <td class="youbi_0">30</td>
          <td class="youbi_1">31</td>
          <td class="gray">1</td>
          <td class="gray">2</td>
          <td class="gray">3</td>
          <td class="gray">4</td>
          <td class="gray">5</td> -->
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="7"><a href="/">Today</a></th>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
