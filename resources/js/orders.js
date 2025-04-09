let cart = [];
function loadOrders() {
    let total = 0;
    $('#cartTableBody').empty();
    $('#errors').empty();
    $('#message').empty();
    const token = localStorage.getItem('token');
    if (!token) {
        return window.location.href = '/';
    }
    $.ajax({
        url: '/api/orders',
        method : 'get',
        contentType: 'application/json',
        headers: {
            Authorization: 'Bearer '+ token
        },
        success: function (orders){
            if (orders.length === 0) {
                $('#ordersContainer').html('<p>No orders found.</p>');
                return;
            }
            orders.data.forEach(order => {
                let html = `
                    <h3>Order #${order.id} | Placed on: ${order.created_at}</h3>
                    <p><strong>Name:</strong> ${order.name}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                let total = 0;
                order.items.forEach(item => {
                    let subtotal = item.quantity * item.price;
                    total += subtotal;

                    html += `
                        <tr>
                            <td>${item.product_name}</td>
                            <td>${item.quantity}</td>
                            <td>${item.price}</td>
                            <td>${subtotal}</td>
                        </tr>`;
                });

                html += `
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                                <td><strong>${total}</strong></td>
                            </tr>
                        </tfoot>
                    </table>`;

                $('#ordersContainer').append(html);
            });
        },
        error : function (xhr, status, error){
            var err = JSON.parse(xhr.responseText);
            $("#errors").html(err);
        }
    });
}


$(document).ready(function () {
    const token = localStorage.getItem('token');
    if (!token) return window.location.href = '/';
    loadOrders();
});
