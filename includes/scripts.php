<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask($conn);
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
     
    // JOINS

    function getTasks($conn , $q)
    {
            $sql = "SELECT * FROM tasks WHERE status = '$q'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            } else {
                 echo "0 results";
                 echo $sql;
            } 
    }

    function saveTask($conn)
    {
        //CODE HERE
            // Variables
                $title = $_POST['title'];
                $type = $_POST['type'];
                $priority = $_POST['priority'];
                $status = $_POST['status'];
                $date = $_POST['date'];
                $description = $_POST['description'];
        //SQL INSERT
            // Action
                $sql = "INSERT INTO tasks(`title`, `type`, `priority`, `status`, `task_datetime`, `description`) 
                VALUES ('$title', '$type' , '$priority' , '$status' , '$date', '$description')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['message'] = "Task has been added successfully !";
                } else {
                    $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
        
		header('location: ../index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>