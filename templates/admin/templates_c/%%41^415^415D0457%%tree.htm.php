<?php /* Smarty version 2.6.12, created on 2007-02-03 18:21:31
         compiled from tree.htm */ ?>
<script language="JavaScript" src="../js/tree.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>
<script language="JavaScript" src="../js/tree_items.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>
<script language="JavaScript" src="../js/tree_tpl.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>
<?php $_from = $this->_tpl_vars['variables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
<table cellpadding="5" cellspacing="0" cellpadding="10" border="0" width="100%">
<tr>
	<td>Каталог</td>
</tr>
<tr>
	<td> 
	<form action="cat_manager.php?do=1" method="post" name="formadm" >
	<input type="Hidden" name="open_it" value="<?php echo $this->_tpl_vars['open_it']; ?>
">
	<?php echo '
	<script language="JavaScript">
	<!--//
	  		new tree (TREE_ITEMS, TREE_TPL);
	//-->
	</script>
		<script language="JavaScript">
	function des(name)
	{
	document.formadm.type_but.value=name
	document.formadm.inputt.disabled=true
	document.formadm.del.disabled=true
	document.formadm.delall.disabled=true
	document.formadm.up.disabled=true
	document.formadm.ren.disabled=true
	document.formadm.i_insert.disabled=true
	document.formadm.tr_branch.disabled=true					
//alert("document.formadm." + name + "_.value=1");
	//eval("document.formadm." + name + "_.value=1")
	document.formadm.submit()	


	//alert("aaa");
	
	}
	
	
	function des2(name)
	{
	
	document.formadm.type_but.value=name
	
	document.formadm.inputt.disabled=true
	document.formadm.del.disabled=true
	document.formadm.delall.disabled=true
	document.formadm.up.disabled=true
	document.formadm.ren.disabled=true
	document.formadm.i_insert.disabled=true
	document.formadm.tr_branch.disabled=true	
		
	
	
	
	var st = "Delete?";
	if(confirm(st)){
		document.formadm.submit()	
	}else{
	document.formadm.inputt.disabled=false
	document.formadm.del.disabled=false
	document.formadm.delall.disabled=false
	document.formadm.up.disabled=false
	document.formadm.ren.disabled=false
	document.formadm.i_insert.disabled=false
	document.formadm.tr_branch.disabled=false
		return false;
	}

	}
	</script>
	'; ?>

<!--------------------------------------->
	<?php echo $this->_tpl_vars['open_cat']; ?>

<!--------------------------------------->	
	<br><br>
	<table border="0" cellpadding="20">
	<tr><td valign="top">
	
	<input type="Text" class="input" name="in"><br><br>
	         <input  type="Submit" onclick='des(this.name)' class="inputa" name="inputt" value="<?php echo $this->_tpl_vars['v']['add']; ?>
" style="width:133"></td>

			 <td valign="top"><input  type="Submit" onclick='return des2(this.name)' class="inputa" name="del" value="<?php echo $this->_tpl_vars['v']['delone']; ?>
" style="width:120">&nbsp;<br><br>

			 <input  type="Submit" onclick='return des2(this.name)' name="delall" class="inputa" value="<?php echo $this->_tpl_vars['v']['delall']; ?>
" style="width:120"></td>

			 <td valign="top"><?php echo $this->_tpl_vars['v']['trans']; ?>
 <input type="Text" class="input" name="id_i" style="width: 40"> <?php echo $this->_tpl_vars['v']['to']; ?>
 <input class="input" type="Text" name="id_k" style="width: 40"><br><br><input  type="Submit" onclick='des(this.name)' name="up" class="inputa" value="<?php echo $this->_tpl_vars['v']['trantree']; ?>
" style="width:165"></td>
			 </tr>
			 
			 <tr><td valign="top"><input type="Text" class="input" name="rename"><br><br>
	         <input  type="Submit" onclick='des(this.name)' class="inputa" name="ren" value="<?php echo $this->_tpl_vars['v']['ren']; ?>
" style="width:133"></td>

<td>
<table border="0">
<tr>
<td><?php echo $this->_tpl_vars['v']['innumbr']; ?>
</td>
<td><input type=text name="i_num" style="width:30"></td>
</tr>
<tr>
<td><?php echo $this->_tpl_vars['v']['innambr']; ?>
</td>
<td><input type=text name="name_num" style="width:150"></td>
</tr>
<tr><td colspan="2"><?php echo $this->_tpl_vars['v']['up']; ?>
 <input type="Radio" name="direct" value="1"> <?php echo $this->_tpl_vars['v']['down']; ?>
 <input type="Radio" value="0" name="direct" </td></tr>
<tr><td colspan="2"><input  type="Submit" onclick='des(this.name)' name="i_insert" style="width:200" value="<?php echo $this->_tpl_vars['v']['insid']; ?>
"></td>

</tr>
</table>
</td>
<td> <?php echo $this->_tpl_vars['v']['trans']; ?>
 <input type="Text" class="input" name="id_b1" style="width: 40"> <?php echo $this->_tpl_vars['v']['to']; ?>
 <input class="input" type="Text" name="id_b2" style="width: 40"><br><br><input  type="Submit" onclick='des(this.name)' name="tr_branch" class="inputa" value="<?php echo $this->_tpl_vars['v']['tranbr']; ?>
" style="width:165"></td>
<tr>
<input type="Hidden" name="type_but">
	</form>
	
	</td>
	
</tr>
</table>
<?php echo '
<style>
A {
	FONT-WEIGHT: bold; FONT-SIZE: 13px; COLOR: #3d4f7f; TEXT-DECORATION: none
}
A:hover {
	COLOR: #c33c35; TEXT-DECORATION: underline
}
A.afliste:visited {
	COLOR: #c33c35; TEXT-DECORATION: none
}
.y {
	COLOR: #F0E68C; FONT-FAMILY: "Arial", "Verdana", "Tahoma" ; FONT-SIZE: 12px; FONT-WEIGHT: bold
}


DIV {
	COLOR: #003399; FONT-FAMILY: "Arial", "Verdana", "Tahoma",  "Helvetica"; FONT-SIZE: 12px; FONT-WEIGHT: bold 
}
.div_hin {
	COLOR: Black;
	FONT-FAMILY:  "Tahoma", "Arial", "Verdana", "Helvetica";
	FONT-SIZE: 11px;
	FONT-WEIGHT: bolder;
}

TD {
	COLOR: #000000; FONT-SIZE: 12px
}
TD.white {
	COLOR: #FFFFFF;FONT-FAMILY:"Arial", "Verdana", "Tahoma" ; FONT-SIZE: 12px
}
TD.whiteb {
	COLOR: #FFFFFF;FONT-FAMILY:"Arial", "Verdana", "Tahoma" ; FONT-SIZE: 12px; FONT-WEIGHT: bold
}

TD.secban {
	COLOR: #000000; FONT-FAMILY: "Verdana", "Tahoma", "Arial", "Helvetica"; FONT-SIZE: 14px; FONT-STYLE: italic; FONT-WEIGHT: bold
}
TD.category {
	COLOR: #000000; FONT-FAMILY: "Verdana", "Tahoma", "Arial", "Helvetica"; FONT-SIZE: 14px; FONT-WEIGHT: bold
}

.final {
	 COLOR: #003399; FONT-FAMILY: "Arial", "Verdana", "Tahoma",  "Helvetica"; FONT-SIZE: 12px; FONT-WEIGHT: bold
}
UL {
	FONT-FAMILY: "Arial", "Verdana", "Tahoma", "Helvetica"; FONT-SIZE: 12px; FONT-WEIGHT: bold
}
TD.dostavka {
	 COLOR: #000000; FONT-FAMILY: "Arial", "Verdana", "Tahoma",  "Helvetica"; FONT-SIZE: 12px; FONT-WEIGHT: normal
}
INPUT.zip {
FONT-FAMILY: "Arial", "Verdana" , "Tahoma" ; FONT-SIZE: 12px;
}
.text {
	 COLOR: #000000; FONT-FAMILY: "Arial", "Verdana", "Tahoma",  "Helvetica"; FONT-SIZE: 12px; FONT-WEIGHT: bold
}
.tr_link {cursor : pointer;}
BODY {
	margin-top:0; 
	margin-left:0; 
	margin-right:0; 
	margin-bottom:0; 
}
.red
{
color: red;
	}


.left
{
margin-left: 25px;
}

	.tdr
	{
	margin-bottom: 5px;
	margin-top: 5px
}

TABLE.login {
	PADDING-RIGHT: 2px; PADDING-LEFT: 2px; FONT-WEIGHT: bold; FONT-SIZE: 11px; PADDING-BOTTOM: 2px; COLOR: #3d4f7f; PADDING-TOP: 2px; BACKGROUND-COLOR: #f2f2f6
}
.Atree {
	{color: #000000; 
	font-weight: normal;
	text-decoration: none; font-family: 
	Tahoma, Verdana; 
	font-size: 12px}
}
.Atree:hover {
	COLOR: #c33c35; 
	font-weight: normal;
	TEXT-DECORATION: underline
}
.rad
{
border : none;
height : 14px;	}
.ny
{
margin-bottom: 10px;

	}
	.style21p
	{
	FONT-WEIGHT: bold; FONT-SIZE: 12px; COLOR: #3d4f7f; TEXT-DECORATION: none
}
.style21p:hover {
	COLOR: #c33c35; TEXT-DECORATION: underline
}
 .bold
 {
 font-weight: bold;
	
}
</style>
'; ?>

<?php endforeach; endif; unset($_from); ?>