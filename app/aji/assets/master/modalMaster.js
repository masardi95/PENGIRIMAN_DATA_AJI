function loading(is) {
	if (is) {
		$('#modalLoading').modal('show');
	}else{
		$('#modalLoading').modal('hide');		
	}
}

function error(text) {
	$('#modalError').modal('show');
	$('#text-error').html(text);
}

function token(idHeaderToken, idKtegori, idSubkateg, is) {
	if (is) {
		$('#idHeaderToken').val(idHeaderToken);	
		tampilTataCara(idKtegori, idSubkateg)
		$('#modalInsertToken').modal('show');	
	}else{
		$('#modalInsertToken').modal('hide');	
	}
}

function tampilTataCara(idKtegori,idSubkateg) {
	//===========IST 1
	if (idKtegori==0) {
		console.log('SUB KATEGORI');
		if (idSubkateg==1) {
			rubah(1);
			$("#ist_1").css("display", "block");
		}
		if (idSubkateg==2) {
			rubah(2);
		}
		if (idSubkateg==3) {
			rubah(3);
		}
		if (idSubkateg==4) {
			rubah(4);
		}
		if (idSubkateg==5) {
			rubah(5);
		}
		if (idSubkateg==6) {
			rubah(6);
		}
		if (idSubkateg==7) {
			rubah(7);
		}
		if (idSubkateg==8) {
			rubah(8);
		}
		if (idSubkateg==9) {
			rubah(9);
		}
	}else{	
		console.log('KATEGORI');
		if (idKtegori==1) {
			$('#textTataCara').html('kategori 1');
		}
		if (idKtegori==2) {
			$('#textTataCara').html('kategori 2');
		}
		if (idKtegori==3) {
			$('#textTataCara').html('kategori 3');
		}
		if (idKtegori==4) {
			$('#textTataCara').html('kategori 4');
		}
		if (idKtegori==5) {
			$('#textTataCara').html('kategori 5');
		}
		if (idKtegori==6) {
			$('#textTataCara').html('kategori 6');
		}
		if (idKtegori==7) {
			$('#textTataCara').html('kategori 7');
		}
	}


	function rubah(subist) {
		for (var i = 1; i <= 9; i++) {
			if (i==subist) {
				$("#ist_"+i).css("display", "block");
			}else{
				$("#ist_"+i).css("display", "none");
			}
		}
	}
}