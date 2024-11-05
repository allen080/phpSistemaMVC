<?php $render('header'); ?>

<h2>Adicionar usuário</h2>
<form method="POST" action="<?=$base?>/usuarios/novo">
    <label>
        Nome<br/>
        <input name="nome" type="text"/>
    </label><br/><br/>

    <label>
        Email<br/>
        <input name="email" type="email"/>
    </label><br/><br/>
    
    <input type="submit"/>
</form>

<?php $render('footer'); ?>
