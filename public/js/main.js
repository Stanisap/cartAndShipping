$(function () {
    // opens and closes the nav menu for a responsive layout
    let nav = $('#nav');
    let navToggle = $('#navToggle');

    navToggle.on('click', function(event) {
        event.preventDefault();

        nav.toggleClass('show');
    });

    // Sending a request by ajax for removing quantity of products
    $('.formRemove').on('submit', function (event) {
        event.preventDefault();
        let $form = $(this);
        let quantity = $form.next().val();
        let uriRemove = $form.attr('action');

        $.get(uriRemove, function () {
            if (quantity < 2) {
                removeAllTheSameProducts($form);
            } else {
                quantity--;
                $form.next().val(quantity);
            }
            getCostAllTheSameProduct($form, quantity);
            getFullCost();
        });
    });

    // Sending a request by ajax for adding quantity of products
    $('.formAdd').on('submit', function (event) {
        event.preventDefault();
        $form = $(this);
        let quantity = $form.prev().val();
        let uriRemove = $form.attr('action');
        if (quantity < 50) {
            $.get(uriRemove, function () {
                quantity++;
                $form.prev().val(quantity);
                getCostAllTheSameProduct($form, quantity);
                getFullCost();
            });
        }
    });

    // Sending a request by ajax that removes all the same products
    $('.trash').on('submit', function (event) {
        event.preventDefault();
        let $form = $(this);
        let uri = $form.attr('action');
        $.get(uri, function () {
            removeAllTheSameProducts($form);
            getFullCost();
        });
    });

    // The function removes all the same products
    function removeAllTheSameProducts(element) {
        element.closest('li.cart-item').remove();
    }

    // The function returns full cost the same product
    function getCostAllTheSameProduct(element, quantity) {
        let spanTotal = element.closest('li.cart-item')
            .children('div.cart-right').children('div.total-group')
            .children('span.total');
        let price = element.closest('li.cart-item').children('input.price-product').val();
        let total = (price * quantity);
        spanTotal.html(total.toFixed(2));
    }
    // The function returns full cost all product
    function getFullCost() {
        let spans = $('.cart-list').children('li')
            .children('div.cart-right').children('div.total-group')
            .children('span');
        let sum = 0;
        for (let i = 0; i < spans.length; i++) {
            sum +=  parseFloat(spans[i].innerText);
        }
        $('#full-cost').html(sum.toFixed(2));
    }

    // Makes validation fields in the form
    $('input#name, input#email, input#address, input#phone').unbind().blur( function(){

        let id = $(this).attr('id');
        let val = $(this).val();

        switch(id)
        {
            // check name
            case 'name':
                let rv_name = /^[a-zA-Zа-яА-Я]+$/;

                if(val.length >= 2 && val !== '' && rv_name.test(val))
                {
                    addValid($(this), 'Excellent!');
                } else {
                    addInvalid($(this), 'invalid name, the field must contain from 2 symbols');
                }
            break;
            // check address
            case 'address':
                let rv_address = /^[a-zA-Zа-яА-Я0-9,|.|.,|\s|-]+$/;

                if(val.length >= 10 && val !== '' && rv_address.test(val))
                {
                    addValid($(this), 'Excellent!');
                } else {
                    addInvalid($(this), 'invalid address');
                }
            break;
            // check phone
            case 'phone':
                let rv_phone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;

                if (val === '' || rv_phone.test(val)) {
                    addValid($(this), 'Excellent!');
                } else {
                    addInvalid($(this), 'invalid phone, the field mast contain only numbers and a symbol "+", "(", ")"');
                }
            break;
            // Проверка email
            case 'email':
                let rv_email = /^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i;
                if(val === '' || rv_email.test(val)){
                    addValid($(this), 'Excellent!');
                }
                else
                {
                    addInvalid($(this), 'invalid E-mail');
                }
            break;
        }
        // Make a check all fields the form that confirms the order
        if ($('input#name').hasClass('valid') && $('input#address').hasClass('valid')
                && $('input#phone').hasClass('valid') && $('input#email').hasClass('valid')) {
            $('button#pay').removeAttr('disabled');
        } else {
            $('button#pay').prop('disabled', true);
        }
    });

    // The function adds a valid class to the input field
    function addValid(element, message) {
        element.removeClass('invalid').addClass('valid');
        element.next('.error-box').text(message)
            .css('color','green')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }

    // The function adds a invalid class to tht input field
    function addInvalid(element, message) {
        element.removeClass('valid').addClass('invalid');
        element.next('.error-box')
            .html(message)
            .css('color','red')
            .animate({'paddingLeft':'10px'},400)
            .animate({'paddingLeft':'5px'},400);
    }


});
