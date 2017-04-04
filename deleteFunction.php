<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO DELETE PROJECTS AND TASKS
    =================================================================*/
    require 'connection.php';
    session_start();
    $id = $_POST['id'];
    $type = $_POST['type'];

    if($type=='Project'){
        $sql = "DELETE FROM PROJECT WHERE projectID='".$id."'";
        foreach ($_SESSION['ProjectID'] as $key => $pid) 
        {
            if ($pid['projectID'] == $id) {
                // The current vehicle's model is what you are searching for
                // => delete if from $_SESSION
                unset($_SESSION['ProjectID'][$key]);
                print_r($_SESSION['ProjectID']);
            }
            mysqli_query($connection,$sql);
            mysqli_close($connection);
            header('Location: /Damavand/welcome.php');
        }
    }else if($type=='Task'){
        //primary key =  concatination of projectID,phaseID & taskID
        print_r($id);
        $sql = "DELETE FROM TASK WHERE CONCAT(taskID,phaseID,projectID) = ".$id;
        mysqli_query($connection,$sql);
        mysqli_close($connection);
        header('Location: /Damavand/task.php');
    }
    ?>
</div>
