<?php $render('header'); ?>

<h2>Editar usuário</h2>
<form method="POST" action="<?=$base?>/usuarios/editar/<?=$usuario["id"]?>">
    <label>
        Nome<br/>
        <input name="nome" type="text" value="<?=$usuario["nome"]?>"/>
    </label><br/><br/>

    <label>
        Email<br/>
        <input name="email" type="email" value="<?=$usuario["email"]?>"/>
    </label><br/><br/>
    
    <input type="submit"/>
</form>

<?php $render('footer'); ?>
