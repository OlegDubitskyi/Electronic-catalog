	<!--//
	  		new tree (TREE_ITEMS, TREE_TPL);
	//-->
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
