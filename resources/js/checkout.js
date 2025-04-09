let cart = JSON.parse(localStorage.getItem('cart')) || [];
function renderCart() {
    let total = 0;
    $('#cartTableBody').empty();
    $('#errors').empty();
    $('#message').empty();

    if (cart.length === 0) {
        $('#cartTableBody').append(`<tr><td colspan="4">Cart is empty</td></tr>`);
    } else {
        cart.forEach(item => {
            const subtotal = item.quantity * item.price;
            total += subtotal;
            $('#cartTableBody').append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.price}</td>
                        <td>${item.quantity}</td>
                        <td>${subtotal}</td>
                    </tr>
                `);
        });
    }

    $('#totalAmount').text(total);
}

$('#checkoutForm').on('submit', function (e) {
    e.preventDefault();
    const token = localStorage.getItem('token');
    if (!token) {
        return window.location.href = '/';
    }
    const formData = {
        name: $('input[name="name"]').val(),
        phone: $('input[name="phone"]').val(),
        address: $('input[name="address"]').val(),
        items: cart,
    };

    $.ajax({
        url: '/api/checkout',
        method: 'POST',
        headers: {
            Authorization: 'Bearer ' + token
        },
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (res) {
            $('#message').text(res.message);
            alert("Order Has been placed Successfully");
            cart = [];
            localStorage.removeItem('cart');
            renderCart();
            return window.location.href = '/my-orders';
        },
        error: function (xhr) {
            $('#errors').html('');
            if (xhr.status === 422) {
                $.each(xhr.responseJSON.errors, function (key, val) {
                    $('#errors').append(`<div>${val}</div>`);
                });
            } else {
                $('#errors').text(xhr.responseJSON.message || 'Something went wrong.');
            }
        }
    });
});

$(document).ready(function () {
    const token = localStorage.getItem('token');
    if (!token) return window.location.href = '/';
    renderCart();
});
