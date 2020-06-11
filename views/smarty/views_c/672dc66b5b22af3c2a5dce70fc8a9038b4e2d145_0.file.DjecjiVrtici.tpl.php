<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-11 20:28:23
  from 'D:\xampp\htdocs\projekt\views\DjecjiVrtici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee277c7cb2652_54721580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '672dc66b5b22af3c2a5dce70fc8a9038b4e2d145' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\DjecjiVrtici.tpl',
      1 => 1591900096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee277c7cb2652_54721580 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    </head>

    <section id="login">
        <div class="login-container">
            <table id='djecji-vrtici-tablica'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Naziv</th>
                        <th>Adresa</th>
                        <th>Kapacitet</th>
                        <th>Administrator</th>
                        <th>Moderator</th>
                        <th>Prosječna ocjena</th>
                    </tr>
                </thead>
                <tbody>                
                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['lista']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Id;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Naziv;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Adresa;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Kapacitet;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Administrator;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Moderator;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Prosjecna_Ocjena;?>
</td>
                        </tr>
                        <?php
}
}
?>
                </tbody>
            </table>   

            <?php echo '<script'; ?>
>
                $(document).ready(function () {

                    $("#djecji-vrtici-tablica").find('tr').click(function () {

                        // get id vrtića
                        let red = $(this).find('td:first').text();

                        let path = '/projekt/uploads/photogalleries/' + red + '/index.jfif';

                        console.log("path: " + path);

                        window.open(path, '_blank');
                    });
                });
            <?php echo '</script'; ?>
>

        </div>
    </section>
</html><?php }
}
