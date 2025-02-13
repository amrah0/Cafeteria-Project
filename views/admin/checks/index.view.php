<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../styles/checks_s9.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3"><i class="bi bi-check-circle" id="icon"></i> Checks</h2>
        <div class="row mb-3" id="filterbox">
            <div class="col-md-3">
                <label for="fromDate">From:</label>
                <input type="date" id="fromDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="toDate">To:</label>
                <input type="date" id="toDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="userFilter">Filter by User:</label>
                <select id="userFilter" class="form-select">
                    <option value="all">All Users</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button id="applyFilter" class="btn btn-primary w-100">Apply Filter</button>
            </div>
        </div>
        <div class="row" id="usersContainer"></div>
    </div>

    <script src="../../../scripts/checks_s9.js"></script>
</body>
</html>
