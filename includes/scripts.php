<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask($conn);
    if(isset($_POST['update']))      updateTask($conn);
    if(isset($_POST['delete']))      deleteTask();

    function getTasks($conn , $q)
    {
            $sql = "SELECT * FROM tasks WHERE status = '$q'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result;
            } else {
                 echo "0 results";
            } 
            $conn->close();
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

    function edit($conn){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = $id";

        $result = $conn->query($sql);
        
        $_SESSION['id'] = $id;
        $conn->close();
        return $result;
    }
    function updateTask($conn)
    {
        //CODE HERE
            $title = $_POST['title'];
            $type = $_POST['type'];
            $priority = $_POST['priority'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $id = $_SESSION['id'];
        //SQL UPDATE
            $sql = "UPDATE `tasks` SET
            `title`='$title',`type`='$type',`priority`='$priority',`status`='$status',
            `task_datetime`='$date',`description`='$description' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
        $conn->close();

        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: ../index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>