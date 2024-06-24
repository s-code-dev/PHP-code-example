/*
*
*Основная страница
*
*/
<?php require __DIR__.'/../header.php';?>

<div calss="block-main">
    <?php if($this->userCheck['user'] ): ?>

    <form class="form-add-case" action="/addCase" method="POST">

        <input type="text" name="case" placeholder="Напишите дело">
        <input type="hidden" name="user_id" value="<?=$this->userCheck['user'][0]['id']?>">

        <input type="submit" value="Добавить дело">

    </form>
    <div class="block-todo">

        <?php if($case): ?>

        <ol>

            <?php foreach($case as $arr): ?>

            <li><?=$arr['case']?><a class="linl-delete" href="/delete/<?=$arr['id']?>">удалить</a></li>

            <?php endforeach; ?>

        </ol>

        <?php else: ?>

        <span>Cписок пуст</span>

        <?php endif;?>

    </div>

    <?php else: ?>

    <h2 style="text-align:center">Добро пожаловать на сайт TO DO LIST</h2>
    <p style="text-align:center">Для того, чтобы составлять списки дел нужно зарегистрироваться на сайте</p>

    <?php endif;?>

</div>

<?php require __DIR__.'/../footer.php';?>