// console.log('hi, the file loads');

jQuery(document).ready(function ($) {
    $('.upvote-button').on('click', function (e) {
        e.preventDefault();
        // console.log('clicked'); // just to be sure

        let product_id = jQuery(this).attr('id') // we'll need this later

        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'shop_product_upvote', // PHP function
                product_id: product_id // we need to make this dynamic
            },
            success: function (msg) {
                console.log(msg);
            }
        });
    });
});
