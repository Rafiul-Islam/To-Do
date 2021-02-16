<?php
$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>
</html>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>To Do</title>
</head>
<body>
<div class="container mt-5">
    <form class="d-flex justify-content-center" action="new_todo.php" method="post">
        <input class="form-control" type="text" name="todo_name" placeholder="Enter your task">
        <button class="btn btn-secondary ml-2" type="submit" name="submit">
            <i class="fas fa-plus-circle"></i>
        </button>
    </form>
    <div class="mt-3">
        <table class="table table-striped table-info">
            <thead>
            <tr class="text-dark">
                <th scope="col"></th>
                <th scope="col">Status</th>
                <th scope="col">Task</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($todos as $todoName => $todo) : ?>
                <tr>
                    <td></td>
                    <td>
                        <form action="change_status.php" method="post">
                            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                            <input class="form-check-input"
                                   type='checkbox' <?php echo $todo['completed'] ? 'checked' : ''; ?>>
                        </form>
                    </td>
                    <td>
                        <?php echo ucfirst("<span>$todoName</span>"); ?>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    const checkBoxs = document.querySelectorAll("input[type=checkbox]");
    checkBoxs.forEach(cb => {
        cb.addEventListener('click', function () {
            this.parentNode.submit();
        });
    })
</script>
</body>
</html>