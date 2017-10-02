$(document).ready((function(){
    var $orders = $('#orders');
    $.ajax({
        type: 'GET',
        url: 'api/showbookings',
        success: function(orders){
            $.each(orders, function(i, order){
                $orders.append('<tr><td>'+order.bookingid+'</td><td>'+order.L+'</td><td>'+order.L+'</td></tr>'+order.L+'</td><td>');
                
               // console.log('success',order)
            });
        }
    });
}));