
    <a href="javascript:void(0)"
        onclick="if(confirm('Are You sure to delete this record?')){document.querySelector('#delete-task-<?php echo $row['id'] ?>').submit();} else {return false}"
        class="btn btn-danger" id="delete-btn">
            <i class="fa fa-trash"></i>
    </a>
    <form action="includes/scripts.php" method="post" class="d-none" id="delete-task-<?php echo $row['id'] ?>" >
        <input type="hidden" name="delete" value="<?php echo $row['id'] ?>" >
    </form>