// let totalPrice = 0;
// const orderList = document.getElementById('order-list');
//
// function addDrinkToOrder(drinkName, price) {
//     const existingItem = Array.from(orderList.children).find(
//         item => item.dataset.name === drinkName
//     );
//
//     if (existingItem) {
//         const quantitySpan = existingItem.querySelector('.quantity');
//         const newQuantity = parseInt(quantitySpan.textContent) + 1;
//         quantitySpan.textContent = newQuantity;
//
//         const priceBadge = existingItem.querySelector('.badge');
//         priceBadge.textContent = `EGP ${newQuantity * price}`;
//     } else {
//         const listItem = document.createElement('li');
//         listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
//         listItem.dataset.name = drinkName;
//         listItem.innerHTML = `${drinkName} <span class="quantity">1</span>`;
//
//         const priceBadge = document.createElement('span');
//         priceBadge.className = 'badge bg-primary rounded-pill';
//         priceBadge.textContent = `EGP ${price}`;
//
//         listItem.appendChild(priceBadge);
//         orderList.appendChild(listItem);
//     }
//
//     totalPrice += price;
//     document.getElementById('order-total').value = `EGP ${totalPrice}`;
// }
let totalPrice = 0;
const orderList = document.getElementById('order-list');
const form = document.querySelector('form'); // Get the form element

function addDrinkToOrder(drinkName, price, productId) {
    const existingItem = Array.from(orderList.children).find(
        item => item.dataset.name === drinkName
    );

    if (existingItem) {
        // Update quantity and price
        const quantityInput = existingItem.querySelector('input[name="quantity[]"]');
        const quantitySpan = existingItem.querySelector('.quantity'); // Get the quantity span
        const newQuantity = parseInt(quantityInput.value) + 1;

        // Update the quantity input and span
        quantityInput.value = newQuantity;
        quantitySpan.textContent = newQuantity; // Update the visible quantity

        // Update the price badge
        const priceBadge = existingItem.querySelector('.badge');
        priceBadge.textContent = `EGP ${newQuantity * price}`;
    } else {
        // Create a new list item with hidden input elements
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.dataset.name = drinkName;

        // Add hidden input elements for drink name, quantity, price, and product ID
        const nameInput = document.createElement('input');
        nameInput.type = 'hidden';
        nameInput.name = 'name[]';
        nameInput.value = drinkName;

        const quantityInput = document.createElement('input');
        quantityInput.type = 'hidden';
        quantityInput.name = 'quantity[]';
        quantityInput.value = 1;

        const priceInput = document.createElement('input');
        priceInput.type = 'hidden';
        priceInput.name = 'price[]';
        priceInput.value = price;

        const productIdInput = document.createElement('input');
        productIdInput.type = 'hidden';
        productIdInput.name = 'product_id[]';
        productIdInput.value = productId;

        // Add visible elements for display
        listItem.innerHTML = `${drinkName} <span class="quantity">1</span>`;

        const priceBadge = document.createElement('span');
        priceBadge.className = 'badge bg-primary rounded-pill';
        priceBadge.textContent = `EGP ${price}`;

        // Append all elements to the list item
        listItem.appendChild(nameInput);
        listItem.appendChild(quantityInput);
        listItem.appendChild(priceInput);
        listItem.appendChild(productIdInput);
        listItem.appendChild(priceBadge);

        // Append the list item to the order list
        orderList.appendChild(listItem);
    }

    // Update total price
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