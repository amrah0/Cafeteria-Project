let totalPrice = 0;
let orders = []; // Make an array to store the order on button click
const orderList = document.getElementById('order-list');

// Customize addDrinkToOrder function to take one additional argument that refers to product ID
function addDrinkToOrder(drinkName, price, id) {
    const existingItem = Array.from(orderList.children).find(
        item => item.dataset.name === drinkName
    );

    if (existingItem) {
        const quantitySpan = existingItem.querySelector('.quantity');
        const newQuantity = parseInt(quantitySpan.textContent) + 1;
        quantitySpan.textContent = newQuantity;

        const priceBadge = existingItem.querySelector('.badge');
        priceBadge.textContent = `EGP ${newQuantity * price}`;

        // Append or update the orders array, save items & total price
        const order = orders.find(order => order.name === drinkName);
        order.quantity = newQuantity;
        order.totalPrice = newQuantity * price;

    } else {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.dataset.name = drinkName;
        listItem.innerHTML = `${drinkName} <span class="quantity">1</span>`;

        const priceBadge = document.createElement('span');
        priceBadge.className = 'badge bg-primary rounded-pill';
        priceBadge.textContent = `EGP ${price}`;

        listItem.appendChild(priceBadge);
        orderList.appendChild(listItem);

        // Customize addDrinkToOrder function to take one additional argument that refers to product ID
        orders.push({name: drinkName, price: price, quantity: 1, totalPrice: price, id: id});
        console.log(orders);
    }

    totalPrice += price;
    document.getElementById('order-total').value = `EGP ${totalPrice}`;
}

// Create PlaceOrder() function to place order & send order data to PHP controller
function PlaceOrder() {
    // getting the user id from hidden input
    const userId = document.getElementById('user-id').value;

    // Checking if cart is empty, print warning message
    if (orders.length === 0) {
        // Getting a div by ID, a bootstrap class to inform the user to fill the cart
        const warning = document.getElementById('warning');
        warning.className = 'container alert alert-danger';
        warning.textContent = 'Cart cannot be empty. Please enter a valid order.';
    } else {
        let data = {
            user_id: userId,
            orders: orders,
            total_price: totalPrice,
            room_id: document.getElementById('room-select').value,
            notes: document.getElementById('order-notes').value
        };

        fetch('/controllers/user/catalog/create.php', {
            method: 'POST',
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(data),
        })
            .then(response => response.text()) // Change to .text() for debugging
            .then(text => {
                try {
                    console.log('Server response:', text); // Log the raw response
                    const data = JSON.parse(text);
                    console.log(data);
                    alert(data.message || data.error);
                } catch (error) {
                    console.error('Error parsing JSON:', error, text);
                    alert('An error occurred while processing your order.');
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('An error occurred while processing your order.');
            });
                orders = [];
                orderList.innerHTML = '';
                totalPrice = 0;
                document.getElementById('order-notes').value = ``;
                document.getElementById('order-total').value = `EGP ${totalPrice}`;
                document.getElementById('order-total').value = `EGP ${totalPrice}`;
    }
}
