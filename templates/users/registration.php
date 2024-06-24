<?php require __DIR__.'/../header.php';?>
/*
*
* Регистрация
*
*/
<?php if($error): ?>

<span class="error"><?=$error?></span>
<?php  endif; ?>
<div class="authorization">
    <div class="authorization__main">
        <div class="authorization__title">
            <h1>Регистрация</h1>
            <p>Создайте свой аккаунт</p>
        </div>
        <form class="authorization__form form" action="/reg" method="POST">
            <label class="form__label" for="nik">Nikname</label>
            <input class="form__nikname" type="text" name="nik" id="nik">
            <label for="email">Email</label>
            <input class="form__email" type="email" name="email" id="email">
            <label class="form__label" for="password">Пароль</label>
            <input class="form__password" type="password" name="password" id="password">
            <!-- <div class="form__checkbox">
							<div class="form__remember"> <input type="checkbox" name="check" id="check"> 
                                <label for="check">Запомнить меня</label> 
                            </div> 
                            <a href="">Забыли свой пароль?</a> 
                        </div>  -->
            <input type="submit" value="Sign In">
        </form>
    </div>
</div>
<?php require __DIR__.'/../footer.php';?>