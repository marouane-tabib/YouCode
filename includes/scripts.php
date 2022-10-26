<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask($conn);
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }


    function saveTask($conn)
    {
        //CODE HERE
            // Variables
                $title = $_POST['title'];
                $type_id = $_POST['type'];
                $priority_id = $_POST['priority'];
                $status_id = $_POST['status'];
                $date = $_POST['date'];
                $description = $_POST['description'];
        //SQL INSERT
            // Action
                $sql = "INSERT INTO tasks(`title`, `type_id`, `priority_id`, `status_id`, `task_datetime`, `description`) 
                VALUES ('$title', '$type_id' , '$priority_id' , '$status_id' , '$date', '$description')";

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