let cart = JSON.parse(localStorage.getItem('cart')) || [];
$(document).ready(function(){
    const token = localStorage.getItem('token');
    if(!token)
        return window.location.href = '/';

    $.ajax({
        url: '/api/products',
        method : 'get',
        contentType: 'application/json',
        headers: {
            Authorization: 'Bearer '+ token
        },
        success: function (products){
            const list = $("#product_listing");
            list.empty();
            let table = `<table style="width: 100%; border-collapse: collapse;">
                                    <thead style="text-align:justify">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
            products.forEach(function(product){
                table += `<tr style="border: 1px solid #ddd;">
                                        <td><strong>${product.name}</strong></td>
                                        <td>${product.price}</td>
                                        <td>
                                           <button class="update-cart-btn" data-product-id="${product.id}" data-product-name="${product.name}" data-price="${product.price}" data-change="-1" style="background-color: red;">−</button>
                                            <button class="update-cart-btn" data-product-id="${product.id }" data-product-name="${product.name }" data-price="${product.price}" data-change="1" style="background-color: green;">+</button>
                                        </td>
                                      </tr>`;
            });
            table += `</tbody></table>`;

            list.html(table);
        },
        error : function (xhr, status, error){
            var err = JSON.parse(xhr.responseText);
            $("#errors").html(err);
        }
    });

    $('#checkoutBtn').click(function () {
        if (cart.length === 0) {
            alert('Please add some products to cart.');
            return;
        }
        return window.location.href = '/checkout';
    });
    renderCart();
});

$(document).on('click', '.update-cart-btn', function() {
    let productId = $(this).data('product-id');
    let productName = $(this).data('product-name');
    let price = $(this).data('price');
    let change = $(this).data('change');

// function updateCart(productId, productName, change, price) {

    let existing = cart.find(i => i.product_id === productId);
    if (!existing && change > 0) {
        cart.push({ product_id: productId, name: productName, quantity: 1, price: price });
    } else if (existing) {
        existing.quantity += change;
        if (existing.quantity <= 0) {
            cart = cart.filter(i => i.product_id !== productId);
        }
    }
    renderCart();
    localStorage.setItem('cart', JSON.stringify(cart));
    // $(`#qty-${productId}`).text(existing?.quantity || 0);
});

function renderCart() {
    const cartList = $('#cartList');
    cartList.empty();
    let total = 0;
    if (cart.length === 0) {
        cartList.append('<li>Cart is empty</li>');
    } else {
        cart.forEach(item => {
            const subtotal = item.quantity * item.price;
            total += subtotal;
            cartList.append(`<li>${item.name} x ${item.quantity} = ${subtotal.toFixed(2)}</li>`);
        });
        cartList.append(`<strong>Total: ${total.toFixed(2)}</strong>`);
    }
}
