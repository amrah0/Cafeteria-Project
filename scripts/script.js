document.addEventListener("DOMContentLoaded", function () {
    const users = [
        { id: 1, name: "Ahmed Ibrahim", totalOrders: 3 },
        { id: 2, name: "Omar Ahmed", totalOrders: 5 },
        { id: 3, name: "Yara Essam", totalOrders: 2 }
    ];
    
    const orders = {
        1: [{ date: "2025-01-01", amount: "150", id: 101 }],
        2: [{ date: "2025-02-02", amount: "200", id: 102 }],
        3: [{ date: "2025-02-03", amount: "100", id: 103 }]
    };

    const products = {
        101: ["../images/coffee.jpeg", "../images/OIP.jpeg"],
        102: ["../images/cold-drink.jpg", "../images/juice.jpeg"],
        103: ["../images/hot-chocolate.jpg", "../images/coffee.jpeg"]
    };

    const usersContainer = document.getElementById("usersContainer");
    const fromDate = document.getElementById("fromDate");
    const toDate = document.getElementById("toDate");
    const userFilter = document.getElementById("userFilter");
    const applyFilter = document.getElementById("applyFilter");

    function populateUserFilter() {
        users.forEach(user => {
            const option = document.createElement("option");
            option.value = user.id;
            option.textContent = user.name;
            userFilter.appendChild(option);
        });
    }

    function loadUsers(filteredUsers) {
        usersContainer.innerHTML = "";

        if (filteredUsers.length === 0) {
            usersContainer.innerHTML = "<p class='text-center'>No users found.</p>";
            return;
        }

        filteredUsers.forEach(user => {
            const userCard = document.createElement("div");
            userCard.className = "col-md-4 mb-3";
            userCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${user.name}</h5>
                        <p class="card-text">Total Orders: ${user.totalOrders}</p>
                        <button class="btn btn-primary view-orders" data-id="${user.id}">View Orders</button>
                        <div class="orders-container mt-3 d-none" id="orders-${user.id}"></div>
                    </div>
                </div>
            `;
            usersContainer.appendChild(userCard);
        });
    }

    applyFilter.addEventListener("click", function () {
        const selectedUser = userFilter.value;
        const startDate = fromDate.value;
        const endDate = toDate.value;

        let filteredUsers = users.filter(user => {
            if (selectedUser !== "all" && user.id != selectedUser) return false;

            const userOrders = orders[user.id] || [];
            const fromDateObj = startDate ? new Date(startDate) : null;
            const toDateObj = endDate ? new Date(endDate) : null;

            const validOrders = userOrders.filter(order => {
                const orderDate = new Date(order.date);
                return (!fromDateObj || orderDate >= fromDateObj) && (!toDateObj || orderDate <= toDateObj);
            });

            return validOrders.length > 0;
        });

        loadUsers(filteredUsers);
    });

    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("view-orders")) {
            const userId = e.target.getAttribute("data-id");
            const ordersContainer = document.getElementById(`orders-${userId}`);
            ordersContainer.innerHTML = "";
            ordersContainer.classList.toggle("d-none");

            if (!ordersContainer.classList.contains("d-none")) {
                const userOrders = orders[userId] || [];

                if (userOrders.length > 0) {
                    userOrders.forEach(order => {
                        const orderCard = document.createElement("div");
                        orderCard.className = "card mt-2";
                        orderCard.innerHTML = `
                            <div class="card-body">
                                <p class="card-text">Date: ${order.date}</p>
                                <p class="card-text">Amount: ${order.amount}</p>
                                <button class="btn btn-secondary show-products" data-id="${order.id}">Show Products</button>
                                <div class="products-container mt-3 d-none" id="products-${order.id}"></div>
                            </div>
                        `;
                        ordersContainer.appendChild(orderCard);
                    });
                } else {
                    ordersContainer.innerHTML = "<p>No orders available</p>";
                }
            }
        }

        if (e.target.classList.contains("show-products")) {
            const orderId = e.target.getAttribute("data-id");
            const productsContainer = document.getElementById(`products-${orderId}`);
            productsContainer.innerHTML = "";
            productsContainer.classList.toggle("d-none");

            if (!productsContainer.classList.contains("d-none")) {
                if (products[orderId] && products[orderId].length > 0) {
                    products[orderId].forEach(img => {
                        const productCard = document.createElement("div");
                        productCard.className = "card mt-2";
                        productCard.innerHTML = `
                            <div class="card-body text-center">
                                <img src="${img}" alt="Product" class="img-fluid" width="100">
                            </div>
                        `;
                        productsContainer.appendChild(productCard);
                    });
                } else {
                    productsContainer.innerHTML = "<p>No products available</p>";
                }
            }
        }
    });

    populateUserFilter();
    loadUsers(users);
});
