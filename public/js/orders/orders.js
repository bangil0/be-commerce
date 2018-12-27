if( document.getElementById('panel-form-ordersdetail') != null ){
	document.getElementById("id_coupon").onchange = function(){
		var $id_coupon = $("#id_coupon");
		var id_coupon = $(this).val();
		getCoupons(id_coupon)
	};

	function getCoupons(id_coupon) {
		$.getJSON(site_url+"/admin/api/coupons/", {
            id_coupon:id_coupon
        })
        .done(function(res){
            coupons_amount = res.coupons[0].amount
            document.getElementById("discounts").value = coupons_amount;
        })
    }

	$(function() {
		$('#shipping').val(0);
		$('#discounts').val(0);
		$('#tax').val(0);

		setInterval( function() {
			var total = 0;
			var grand_total = 0;
			
			var shipping = $('#shipping').val();
			var discounts = $('#discounts').val();
			var tax = $('#tax').val();
									
			$('#table-ordersdetail tbody .subtotal').each(function(){
				var amount = parseInt( $(this).text() );
				total += amount;
			})
			$('#total_products').val(total);
			
			grand_total = parseFloat(total) + parseFloat(shipping) + parseFloat(tax) - parseFloat(total*discounts/100);
			$('#grand_total').val(grand_total);
		},500)
	});
}