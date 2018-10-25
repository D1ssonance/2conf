<h1>Task Manager</h1>
<nav aria-label="breadcrumb">
    <form action="" method="post">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <button class="btn btn-info" type="submit" name="status" value="done">Завершённые</button>
            </li>
            <li class="breadcrumb-item">
                <button class="btn btn-info" type="submit" name="status" value="inpr">В процессе</button>
            </li>
            <li class="breadcrumb-item">
                <button class="btn btn-info" type="submit" name="status" value="all">Все</button>
            </li>
        </ol>
    </form>
</nav>
<hr class="my-2">
<button id="openAddForm" class="btn btn-success btn-block">Новая задача</button>
<hr class="my-1">
<div id="addNewTask" class="jumbotron form-group" style="display: none">
    <h4>Все поля обязательны к заполнению.</h4>
    <form action="" method="POST">
        <label class="form-control-label">Ваше имя</label>
        <input class="form-control" type="text" name="username" placeholder="Введите имя">
        <label class="form-control-label">Ваш email</label>
        <input type="email" class="form-control" name="email" placeholder="Введите email">
        <label class="form-control-label">Задача</label>
        <textarea name="task" cols="30" rows="10" class="form-control" placeholder="Опишите задачу"></textarea>
        <hr class="my-3">
        <button class="btn btn-primary" name="save" value="true">Сохранить</button>
    </form>
</div>
<form action="" method="post">
    <label class="form-control-label p-2 mr-auto">Сортировать по:</label>
    <select class="form-control p-2" name="sort">
        <option value="date">Времени</option>
        <option value="user">Пользователю</option>
        <option value="email">Почте</option>
    </select>
    <div class="btn-group p-2" role="group">
        <button type="submit" name="method" value="ASC" class="btn btn-secondary">Возрастанию</button>
        <button type="submit" name="method" value="DESC" class="btn btn-secondary">Убыванию</button>
    </div>
</form>

<ul class="pagination d-flex justify-content-center">
    <? foreach ($paginationLinks as $link): ?>
        <li class="page-item"><a class="page-link" href="<?= $link['link'] ?>"><?= $link['page'] ?></a></li>
    <? endforeach; ?>
</ul>

<? foreach ($tasks as $task): ?>
    <div class="jumbotron">
        <h5><?= $task['username'] ?></h5>
        <h6><?= $task['email'] ?></h6>
        <textarea class="form-control" rows="10" disabled><?= $task['task'] ?></textarea>
    </div>
<? endforeach; ?>

<script>
    $(function () {
        $('#openAddForm').click(function () {
            $('#addNewTask').slideToggle(300)
        })
    })
</script>