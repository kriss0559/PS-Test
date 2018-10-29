function filterClient() {
    var client = {
        client_id: $('#clients').val(),
        product_id: $('#products').val(),
        relative_dates: $('#relative_dates').val()
    }
    jQuery.ajax({
        url: $('#url').val(),
        type: "POST",
        data: client,
        dataType: "json",
        success: function(result) {

            $('#myTable').text('');
            $.each(result, function(index, element) {
                if (index == "products") {
                    var totalrecords = 0;
                    $.each(element, function(index2, element2) {
                        totalrecords = totalrecords + 1;
                        var mydateArray = element2.invoiceDate.date.split(" ");

                        $("#table_format").find('tbody')
                            .append($('<tr>')
                                .append($('<td>')
                                    .append(element2.invoiceNum)
                                )
                                .append($('<td>')
                                    .append(mydateArray[0])
                                )
                                .append($('<td>')
                                    .append(element2.productDescription)
                                )
                                .append($('<td>')
                                    .append(element2.qty)
                                )
                                .append($('<td>')
                                    .append(element2.price)
                                )

                                .append($('<td>')
                                    .append(element2.qty * element2.price)
                                )
                            );
                    })
                    $("#total_records").html(totalrecords)
                }
            });
        }
    });
}

function filterProduct() {
    var client = {
        client_id: $('#clients').val(),
        product_id: $('#products').val(),
        relative_dates: $('#relative_dates').val()
    }
    jQuery.ajax({
        url: $('#url').val(),
        type: "POST",
        data: client,
        dataType: "json",
        success: function(result) {

            $('#myTable').text('');
            $.each(result, function(index, element) {
                if (index == "products") {
                    var totalrecords = 0;
                    $.each(element, function(index2, element2) {
                        totalrecords = totalrecords + 1;
                        var mydateArray = element2.invoiceDate.date.split(" ");

                        $("#table_format").find('tbody')
                            .append($('<tr>')
                                .append($('<td>')
                                    .append(element2.invoiceNum)
                                )
                                .append($('<td>')
                                    .append(mydateArray[0])
                                )
                                .append($('<td>')
                                    .append(element2.productDescription)
                                )
                                .append($('<td>')
                                    .append(element2.qty)
                                )
                                .append($('<td>')
                                    .append(element2.price)
                                )

                                .append($('<td>')
                                    .append(element2.qty * element2.price)
                                )
                            );
                    })
                    $("#total_records").html(totalrecords)
                } else if (index == "product_options") {
                    $('#products').empty();

                    $.each(element, function(index2, element2) {
                        $('#products')
                            .append($('<option>', {
                                    value: element2.productId
                                })
                                .text(element2.productDescription));
                    })
                }


            });
        }
    });

}