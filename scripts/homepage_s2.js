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

// Search functionality
document.getElementById('search-bar').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const drinkCards = document.querySelectorAll('.drink-card');

    drinkCards.forEach(card => {
        const drinkName = card.querySelector('p').textContent.toLowerCase();
        if (drinkName.includes(searchValue)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
});