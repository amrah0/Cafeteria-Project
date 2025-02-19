let totalPrice = 0;
let orders = []; // Make an array to store the order on button click
const orderList = document.getElementById('order-list');

function addDrinkToOrder(drinkName, price) {
    const existingItem = Array.from(orderList.children).find(
        item => item.dataset.name === drinkName
    );

    if (existingItem) {
        const quantitySpan = existingItem.querySelector('.quantity');
        const newQuantity = parseInt(quantitySpan.textContent) + 1;
        quantitySpan.textContent = newQuantity;

        const priceBadge = existingItem.querySelector('.badge');
        priceBadge.textContent = `EGP ${newQuantity * price}`;
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