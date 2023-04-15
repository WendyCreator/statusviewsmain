<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    require 'config.php';
    
    if(isset($_GET['action']) and !empty($_GET['action'])){
        $response = $_GET['action'];
        if($response == 'none'){
            $_SESSION['actionmssg'] = 'Please select a date range for easier compilation!';
            header('Location: download-action');
        }else{
           

            $sql = formQuery("SELECT * FROM ceecontacts WHERE ddate LIKE '%$response%' ORDER BY id DESC");
            if($sql->num_rows > 0){
                
                $newdate = substr($response, 0, 10);
                // echo $newdata;
                // var_dump($row);
                $delimiter = ',';
                $filename = "contacts-info-$newdate.csv";

                // Create a file pointer
                $f = fopen('php://memory', 'w');

                // Set column headers

                $fields = array('ID', 'Fullname', 'Phone Number');
                fputcsv($f, $fields, $delimiter);

                // Output each row of the data, format line as csv and write to file pointer;

                while($row=$sql->fetch_assoc()){
                    $linedata = array($row['id'], $row['fullname'], $row['dphone']);
                    fputcsv($f, $linedata, $delimiter);

                    // move back to the begining of the file

                    fseek($f, 0);

                    // Set header to download file rather than displayed

                    header('Content-Type: text/csv');
                    header('Content-Disposition: attachment; filename=' . "$filename");

                    // Output all the remaining data on the file pointer
                    fpassthru($f);
                    $_SESSION['actionmssg'] = 'Contacts Downlaoded Successfully!';
                    exit;
                }


            }else{
                $_SESSION['actionmssg'] = "No contact has been recorded for this date!";
            }
        }

        // echo $_SESSION['actionmssg'];
    }
}