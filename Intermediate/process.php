<?php

  require("connect.php");


  $query = "SELECT * FROM leads WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%') AND registered_datetime BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}' LIMIT {$_POST['page_num']}, 10;";


  $users = fetch_all($query);


 $html = "
  <table>
    <thead>
      <tr>
        <th>leads_id</th>
        <th>first_name</th>
        <th>registered_datetime</th>
        <th>Date</th>
        <th>email</th>
      </tr>
    </thead>
    </tbody>
  ";
  $count = 0;
  foreach($users as $user)
  {
    $count++;
    $date = substr($user['registered_datetime'], 0, 10);
    $html .="
        <tr>
          <td>{$user['leads_id']}</td>
          <td>{$user['first_name']}</td>
          <td>{$user['last_name']}</td>
          <td>{$date}</td>
          <td>{$user['email']}</td>
        </tr>
    ";

  }

    $html .= "
            </tbody>
            </table>
    ";

    echo json_encode($html);


 ?>