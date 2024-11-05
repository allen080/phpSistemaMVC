<?php $render('header'); ?>

<head><style>
    td {
        text-align:center;
    }
</style></head>
<a href="<?=$base?>/usuarios/novo">Adicionar usuário</a>
<br/>
<br/>
<table width="100%" border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>ID</th>
        <th>Ações</th>
    </tr>

    <?php foreach($usuarios as $user): ?>
        <tr>
            <td><?=$user["nome"]?></td>
            <td><?=$user["email"]?></td>
            <td><?=$user["id"]?></td>
            <td>
                <a href="<?=$base?>/usuarios/editar/<?=$user["id"]?>">[ Editar ]</a>
                <a href="<?=$base?>/usuarios/excluir/<?=$user["id"]?>" onclick='return confirm("Deseja excluir o usuário <?=$user["id"]?>?")'>[ Excluir ]</a>

            </td>

        </tr>
    <?php endforeach; ?>
</table>

<?php $render('footer'); ?>
