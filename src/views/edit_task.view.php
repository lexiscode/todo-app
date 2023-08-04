<?php require "partials/header.view.php"; ?>

    <div class="container">
        <!--Introduction header-->
        <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Update My ToDo List</h1>

        <!--First Top Form-->
        <div class="w-50 m-auto">
            <form action="" method="POST" autocomplete="off">
                <label for="task">Task:</label>
                <input class="form-control" type="text" name="task" id="task" value="<?= htmlspecialchars($todo_data->task) ?>">
                <br>
                <label for="due_date">Due Date:</label>
                <input class="form-control" type="date" name="due_date" id="due_date" value="<?= htmlspecialchars($todo_data->due_date) ?>">
                <br>
                <button type="submit" class="btn btn-success" name="updateTask">Update ToDo</button>
            </form>
        </div>
</div>

<?php require "partials/footer.view.php"; ?>