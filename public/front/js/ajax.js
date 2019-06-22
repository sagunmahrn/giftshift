$(document).ready(function () {
    $('#search_data').on('keyup', function () {
        let getVal = $(this).val();
        if (getVal.length == 0) {
            $('#search_all_data').html('enter any keywords');
            return false;

        } else {
            let sendUrl = URL + '/search-product/' + getVal;
            $.ajax({
                type: 'GET',
                url: sendUrl,
                success: function (response) {
                    $('#search_all_data').html(response)
                }

            });
        }


    });
});