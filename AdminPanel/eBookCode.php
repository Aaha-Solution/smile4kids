<?php
if (!isset($_SESSION)) {
    session_start();
    require dirname(__DIR__) . '/database/dbconfig.php';
}
// $_SESSION['ses_data_id'] = "";
if (isset($_POST['save_data'])) {

    $upload_dir = 'hwUploads/';
    // $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
    $allowed_types = array('pdf', 'docx');
    // Maxsize for files i.e 50MB
    $maxsize = 52428800;

    // Checks if user sent an empty form

    //if (!empty(array_filter($_FILES['files']['name']))) {

        // Loop through each file in files[] array
       // foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            $category = $_POST['category'];
            $subject = $_POST['subject'];
            $amount = $_POST['eBamount'];
            $terms = $_POST['terms'];
            // $date = $_POST['addDate'];
            $section = $_POST['section'];

            $file_tmpname = $_FILES['files']['tmp_name'];
            $file_name = $_FILES['files']['name'];
            $file_size = $_FILES['files']['size'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // Set upload file path
            $filepath = $upload_dir . $file_name;
            // if ($file_name == NULL || $date == NULL) {
            // $res = [
            // 'status' => 422,
            // 'message' => 'All fields are mandatory'
            // ];
            // echo json_encode($res);
            // return;
            // }
            // Check file type is allowed or not
            if (in_array(strtolower($file_ext), $allowed_types)) {
                if ($file_size > $maxsize) {
                    $res = [
                        'status' => 100,
                        'message' => 'File size is larger than the allowed limit.'
                    ];
                    echo json_encode($res);
                    return false;
                } else if (file_exists($filepath)) {
                    $filepath = $upload_dir . $file_name . time();

                    if (move_uploaded_file($file_tmpname, $filepath)) {
                        $insertQuery = "INSERT INTO addhomework(Section, Category, Subject, Amount, Terms, Files, file_Path, Date) VALUES('$section', '$category', '$subject', '$amount', '$terms', '$file_name', '$filepath', '$date')";
                        $queryRun = mysqli_query($connection, $insertQuery);
                        if ($queryRun) {
                            $res = [
                                'status' => 200,
                                'message' => 'E-Book Added Successfully...!'
                            ];
                            echo json_encode($res);
                        } else {
                            $res = [
                                'status' => 500,
                                'message' => 'Somthing Went to Wrong...!'
                            ];
                            echo json_encode($res);
                            return false;
                        }
                    }
                } else {

                    if (move_uploaded_file($file_tmpname, $filepath)) {
                        $insertQuery = "INSERT INTO addhomework(Section, Category, Subject, Amount, Terms, Files, file_Path, Date) VALUES('$section', '$category', '$subject', '$amount', '$terms', '$file_name', '$filepath', '$date')";
                        $queryRun = mysqli_query($connection, $insertQuery);

                        $res = [
                            'status' => 200,
                            'message' => 'E-Book Added Successfully...!'
                        ];
                        echo json_encode($res);
                    } else {
                        $res = [
                            'status' => 500,
                            'message' => 'Somthing Went to Wrong...!'
                        ];
                        echo json_encode($res);
                        return false;
                    }
                }
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Invaild file formate....!'
                ];
                echo json_encode($res);
                return false;
            }
 
}


if (isset($_POST['update_data'])) {

    $upload_dir = 'hwUploads/';
    // $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
    $allowed_types = array('pdf', 'docx', 'mp3', '3gp', 'm4p');
    // Maxsize for files i.e 50MB
    $maxsize = 52428800;

    $data_id = $_SESSION['ses_data_id'];
    printf($data_id);
    $category = $_POST['category'];
    $subject = $_POST['subject'];
    $amount = $_POST['amount'];
    $oldfile = $_POST['oldfile'];
    var_dump($amount);
    // $files = mysqli_real_escape_string($connection, $_FILES['files']);

    $file_tmpname = $_FILES['files']['tmp_name'];
    $file_name = $_FILES['files']['name'];
    $file_size = $_FILES['files']['size'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Set upload file path
    $filepath = $upload_dir . $file_name;


    if ($category == NULL || $subject == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }
    if (!empty($_FILES['files']['tmp_name'])) {
        if (in_array(strtolower($file_ext), $allowed_types)) {
            if ($file_size > $maxsize) {
                $res = [
                    'status' => 100,
                    'message' => 'File size is larger than the allowed limit.'
                ];
                echo json_encode($res);
                return false;
            } else if (move_uploaded_file($file_tmpname, $filepath)) {

                $query = "UPDATE addhomework SET Category= '$category', Amount= '$amount', Subject= '$subject', Files= '$file_name', file_Path= '$filepath' WHERE Id= '$data_id'";
                $query_run = mysqli_query($connection, $query);
                // printf($query);
                if ($query_run) {
                    unlink($oldfile);
                    $res = [
                        'status' => 200,
                        'message' => 'File Updated Successfully'
                    ];
                    echo json_encode($res);
                    return;
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'File Not Updated'
                    ];
                    echo json_encode($res);
                    return;
                }
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'File Not Updated'
                ];
                echo json_encode($res);
                return false;
            }
        }
    } else {
        $query = "UPDATE addhomework SET Category= '$category', Amount= '$amount', Subject= '$subject' WHERE Id= '$data_id'";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $res = [
                'status' => 200,
                'message' => 'Successfully Uploaded to Database'
                ];
                echo json_encode($res);
                return false;
        }
    }
}

if (isset($_GET['data_id'])) {
    $data_id = mysqli_real_escape_string($connection, $_GET['data_id']);
    $_SESSION['ses_data_id'] = $data_id;
    $query = "SELECT * FROM addhomework WHERE Id= '$data_id'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $dataID = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Data Fetch Successfully by id',
            'data' => $dataID
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Data Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_data'])) {
    $data_id = mysqli_real_escape_string($connection, $_POST['data_id']);

    $query = "DELETE FROM addhomework WHERE Id= '$data_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        unlink($_POST['path']);
        $res = [
            'status' => 200,
            'message' => 'E-book Deleted Successfully...!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Data Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['action']) == "update") {
    //print_r($_POST['data']);
    $datas = $_POST['data'];
    //print_r($datas);
    $section = $datas[0]['value'];
    $category = $datas[1]['value'];
    $subject =  $datas[2]['value'];
    $eBamount =  $datas[3]['value'];
    //print_r($subject);
    //echo  $category;
    //print_r($_POST['amt_change']);
    // $category = $_POST['category'];
    // $subject = $_POST['subject'];
    // $amount = $_POST['eBamount'];
    // $section = $_POST['section'];

    $query = "UPDATE addhomework SET Amount='$eBamount' WHERE Section='$section'AND Category='$category' AND Subject='$subject'";
    echo $query;
    $queryRun = mysqli_query($connection, $query);
    //print_r($queryRun);
    // print_r(mysqli_num_rows($queryRun) > 0);
    if ($queryRun) {
        $res = [
            'status' => 200,
            'message' => 'Successfully Updated the Offer Price'
        ];
        echo json_encode($res);
        return;
    }
}
