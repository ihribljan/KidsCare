<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-11 22:38:59
  from 'D:\xampp\htdocs\projekt\views\JavniPozivi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee29663004e43_85252457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2d14e004eb16cd6d443c3715bb08646cd729a81' => 
    array (
      0 => 'D:\\xampp\\htdocs\\projekt\\views\\JavniPozivi.tpl',
      1 => 1591907265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee29663004e43_85252457 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
        
    </head>

    <section id="login">
        <div class="login-container">
            <div class="filter">
                <input name="search" id="search" type="search" placeholder="Naziv dječjeg vrtića..">
            </div>
            <table id='javni-pozivi-tablica'> 
                <thead>
                    <tr>
                        <th>Broj</th>
                        <th>Datum</th>
                        <th>Datum od</th>
                        <th>Datum do</th>
                        <th>Moderator</th>
                        <th>Broj mjesta</th>
                        <th>Dječji vrtić</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Broj;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Datum;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Datum_Od;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Datum_Do;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Moderator;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Broj_Mjesta;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['lista']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->Vrtic;?>
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

                    $('#search').keyup(function() {
                        let naziv = document.getElementById("search").value;
                        console.log(naziv);
                    });
                });
            <?php echo '</script'; ?>
>

        </div>
    </section>
</html><?php }
}
