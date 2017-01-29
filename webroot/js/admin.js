function confirmDelete() {
    if (confirm('Удалить?')) {
        return true;
    } else {
        return false;
    }
}

/* alert messages */
setTimeout(function() {
	$('div.alert-message').fadeOut('slow');
	}, 5000);
	
/* Tooltips */
	$(function () {
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover();
	});

/* AJAX */
    $(document).ready(function () {
			$(".add-item-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
		
		if ( $("div.input-group input.quantity") ) {
			$("div.add-to-cart button").click(function () {
				var quantity = $("input.quantity").val();
				var id = $("div span.item-id").html();
				$.post("/cart/addItemQuantity/" + id + '/' + quantity, {}, function (data) {
				$("#cart-count").html(data);
				});
				return false;
			});
		}
		
		/* - Slider */
		if( $(".slider-items").length ) {
			$(".slider-items").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: false,
				autoplay: true,
				responsive:{
					0:{
						items: 1
					},
					400:{
						items: 2
					},
					640:{
						items: 3
					},
					992:{
						items: 4
					},
					1200:{
						items: 6
					}
				}
			});
		}

		if($(".box-items ").length){
			$(".box-items ").each(function ()
			{
				var $this = $(this);
				var myVal = $(this).data("value");
			});
		}
		
    });

	
	
	
	
	
	
	
	
	