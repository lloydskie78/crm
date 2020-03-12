<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function uploadcsv(){

        if(!empty($_FILES['csv_file']['name']))
        {
         $file_data = fopen($_FILES['csv_file']['name'], 'r');
         fgetcsv($file_data);
         while($row = fgetcsv($file_data))
         {
          $data[] = array(
           'student_id'  => $row[0],
           'student_name'  => $row[1],
           'student_phone'  => $row[2]
          );
         }
         echo json_encode($data);
        }

    }
}
