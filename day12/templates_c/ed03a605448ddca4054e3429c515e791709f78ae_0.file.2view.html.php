<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 13:40:29
  from 'D:\app\PhpStorm\PhpStormProject\day12\2view.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e69cb4d8c1055_17997328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed03a605448ddca4054e3429c515e791709f78ae' => 
    array (
      0 => 'D:\\app\\PhpStorm\\PhpStormProject\\day12\\2view.html',
      1 => 1583991628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e69cb4d8c1055_17997328 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\app\\PhpStorm\\PhpStormProject\\day12\\smarty-3.1.34\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>html代码和php代码分离</title>
</head>

姓名：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br>
年龄：<?php echo $_smarty_tpl->tpl_vars['age']->value;?>

<img src="" alt="">
<br/>
<hr/>
123<p/>

<hr>
PHP时间戳：<?php echo time();?>
 <br>
Smarty时间戳:<?php echo time();?>
<br>

PHP时间戳格式化：<?php echo date("Y-m-d H:i:s");?>
<br>
Smarty时间戳格式化：<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S');?>

<hr>
<h2>foreach 遍历一维数组：适合程序员写法</h2>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'value', true, 'key');
$_smarty_tpl->tpl_vars['value']->iteration = 0;
$_smarty_tpl->tpl_vars['value']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
$_smarty_tpl->tpl_vars['value']->iteration++;
$_smarty_tpl->tpl_vars['value']->index++;
$_smarty_tpl->tpl_vars['value']->first = !$_smarty_tpl->tpl_vars['value']->index;
$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;
$__foreach_value_0_saved = $_smarty_tpl->tpl_vars['value'];
?>
$arr[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
] = <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<br>
<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<hr>
<h2>foreach 遍历一维数组：适合美工人员写法</h2>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'value', true, 'key');
$_smarty_tpl->tpl_vars['value']->iteration = 0;
$_smarty_tpl->tpl_vars['value']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
$_smarty_tpl->tpl_vars['value']->iteration++;
$_smarty_tpl->tpl_vars['value']->index++;
$_smarty_tpl->tpl_vars['value']->first = !$_smarty_tpl->tpl_vars['value']->index;
$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;
$__foreach_value_1_saved = $_smarty_tpl->tpl_vars['value'];
?>
$arr[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
] = <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<br>
<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<hr>
<h2>foreach 遍历二维数组</h2>
<table border="1">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrs']->value, 'arr2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr2']->value) {
?>
    <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr2']->value, 'value', true);
$_smarty_tpl->tpl_vars['value']->iteration = 0;
$_smarty_tpl->tpl_vars['value']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->iteration++;
$_smarty_tpl->tpl_vars['value']->index++;
$_smarty_tpl->tpl_vars['value']->first = !$_smarty_tpl->tpl_vars['value']->index;
$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;
$__foreach_value_3_saved = $_smarty_tpl->tpl_vars['value'];
?>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
        <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_3_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>

<hr>
<h2>foreach的常用属性</h2>
<table border="1">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'value', true);
$_smarty_tpl->tpl_vars['value']->iteration = 0;
$_smarty_tpl->tpl_vars['value']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->iteration++;
$_smarty_tpl->tpl_vars['value']->index++;
$_smarty_tpl->tpl_vars['value']->first = !$_smarty_tpl->tpl_vars['value']->index;
$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;
$__foreach_value_4_saved = $_smarty_tpl->tpl_vars['value'];
?>
    <?php if ($_smarty_tpl->tpl_vars['value']->first) {?>
    <tr>
        <th>值</th>
        <th>索引</th>
        <th>从0开始计数</th>
        <th>从1开始计数</th>
        <th>是否为第1次循环</th>
        <th>是否为最后一次循环</th>
        <th>循环总次数</th>

    </tr>
    <?php }?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->key;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->index;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->iteration;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->first;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->last;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->total;?>
</td>

    </tr>
    <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_4_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>

<hr>
<h2>section 循环一维数组</h2>
<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['arrss']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
echo $_smarty_tpl->tpl_vars['arrss']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
,
<?php
}
}
?>

<hr>
<h2>section循环二维数组</h2>
<table border="1">
    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['arrs']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    <tr>
        <?php
$__section_j_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['arrs']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]) ? count($_loop) : max(0, (int) $_loop));
$__section_j_2_total = $__section_j_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_2_total !== 0) {
for ($__section_j_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_2_iteration <= $__section_j_2_total; $__section_j_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
        <td><?php echo $_smarty_tpl->tpl_vars['arrs']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)];?>
</td>
        <?php
}
}
?>
    </tr>
    <?php
}
}
?>
</table>
</body>
</html><?php }
}
