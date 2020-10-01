function vendor() {
	loading(true);
	$.ajax({
		url: url+'mgtvendor/fetchallvendoraktive',
		type: 'GET',
		dataType: 'JSON',
	})
	.done(function() {
	})
	.fail(function(e) {
		console.log(e);
	})
	.always(function(e) {
		loading(false);
    	$("#vendor").empty();
		$.each(e.dataVendor, function(i, val) {
			$("#vendor").append('<option value="'+val.id_vendor+'" selected>'+val.nama_vendor+'</option>');
		});
		$("#vendor").append('<option value="" selected disabled="">Pilih Vendor</option>');
        $('#vendor').trigger("chosen:updated");

	});	
}

function ddEmailVendor() {
	loading(true);
	$.ajax({
		url: url+'mgtvendor/fetchallvendoraktive',
		type: 'GET',
		dataType: 'JSON',
	})
	.done(function() {
	})
	.fail(function(e) {
		console.log(e);
	})
	.always(function(e) {
		console.log(e);
		loading(false);
    	$("#emailVendor").empty();
		$("#emailVendor").append('<option value="" selected disabled="">Pilih Vendor</option>');
		$.each(e.dataVendor, function(i, val) {
			$("#emailVendor").append('<option value="'+val.id_vendor+'">'+val.email_vendor+' / '+val.nama_vendor+'</option>');
		});
        $('#emailVendor').trigger("chosen:updated");

	});	
}

function ddProductVendorById(id) {
	loading(true);
	$.ajax({
		url: url+'mgtvendor/fetchProductVendorById/'+id,
		type: 'GET',
		dataType: 'JSON',
	})
	.done(function() {
	})
	.fail(function(e) {
		console.log(e);
	})
	.always(function(e) {
		console.log(e);
		loading(false);
    	$("#prodVendor").empty();
		$("#prodVendor").append('<option value="" selected disabled="">Pilih Produk Vendor</option>');
		$.each(e.dataProduct, function(i, val) {
			$("#prodVendor").append('<option value="'+val.id_product+'">'+val.nama_product+' || '+val.harga+' || '+val.ukuran+' m<sup>2</sup></option>');
		});
        $('#prodVendor').trigger("chosen:updated");

	});	
}

function ddUpdateProductVendorById(id, idProd) {
	loading(true);
	$.ajax({
		url: url+'mgtvendor/fetchProductVendorById/'+id,
		type: 'GET',
		dataType: 'JSON',
	})
	.done(function() {
	})
	.fail(function(e) {
		console.log(e);
	})
	.always(function(e) {
		console.log(e);
		loading(false);
    	$("#prodVendor").empty();
		$("#prodVendor").append('<option value="" selected disabled="">Pilih Produk Vendor</option>');
		$.each(e.dataProduct, function(i, val) {
			if (idProd == val.id_product) {
				$("#prodVendor").append('<option value="'+val.id_product+'" selected>'+val.nama_product+' || '+val.harga+' || '+val.ukuran+'</option>');
			}else{
				$("#prodVendor").append('<option value="'+val.id_product+'">'+val.nama_product+' || '+val.harga+' || '+val.ukuran+'</option>');
			}
		});
        $('#prodVendor').trigger("chosen:updated");

	});	
}