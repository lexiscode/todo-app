<?php require "partials/header.view.php"; ?>

<div class="container">
    <!--Introduction header-->
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Welcome To My ToDo List</h1>

    <!--First Top Form-->
    <div class="w-50 m-auto">
        <form action="" method="POST" autocomplete="off">
            <label for="task">Task:</label>
            <input class="form-control" type="text" name="task" id="task" placeholder="Enter Task To Add in Todo">
            <br>
            <label for="due_date">Due Date:</label>
            <input class="form-control" type="date" name="due_date" id="due_date">
            <br>
            <button type="submit" class="btn btn-success" name="addTask">Add To ToDo</button>
            <button type="submit" class="btn btn-secondary" name="clear_all">Clear Lists</button>
        </form>
    </div>
    <br>

    <!--Horizontal line demacation-->
    <hr class="bg-dark w-50 m-auto">

    <!-- Table class="w-50 m-auto"-->
    <div class="w-50 m-auto">
        <h1>Your Lists</h1>

        <table class="table table-dark table-hover">
            <thead align="center">
                <tr>
                <th scope="col">S/N</th>
                <th scope="col">Tasks</th>
                <th scope="col">Due Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <?php if (!empty($all_todos)) : ?>

            <tbody align="center">
                <?php foreach ($all_todos as $index => $task) : ?>
                    <tr>
                        <td><?= htmlspecialchars($task['id']); ?></td>
                        <td><?= $task['task'];; ?></td>
                        <td><?= $task['due_date']; ?></td>
                        <td>
                            <a href="edit_task?id=<?= $task["id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="/todo-app/?id=<?= $task['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <?php else : ?>
                <p>No lists found.</p>
            <?php endif; ?>

        </table>
    </div>
    
</div>

<?php require "partials/footer.view.php"; ?>
