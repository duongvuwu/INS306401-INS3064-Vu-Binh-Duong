<?php
require_once 'Database.php';
// Sử dụng Singleton Pattern để lấy kết nối [cite: 72]
$db = Database::getInstance()->getConnection();

$search = $_GET['search'] ?? '';
$category_id = $_GET['category_id'] ?? '';

// Câu lệnh SQL sử dụng JOIN để lấy tên danh mục [cite: 175]
$sql = "SELECT p.*, c.category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        WHERE p.name LIKE :search";

if ($category_id) {
    $sql .= " AND p.category_id = :cat_id";
}

$stmt = $db->prepare($sql);

// LỖI THƯỜNG GẶP: Bạn có thể đã dùng ":" thay vì "=>" ở đây
$params = [':search' => '%' . $search . '%']; 
if ($category_id) {
    $params[':cat_id'] = $category_id;
}

$stmt->execute($params); // Thực thi an toàn với Prepared Statement [cite: 181]
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Admin</title>
    <style>
        .low-stock { background-color: #ffcccc; color: red; font-weight: bold; } /* Cảnh báo đỏ  */
    </style>
</head>
<body>
    <h1>Product Administration</h1>
    
    <form method="GET">
        <input type="text" name="search" placeholder="Search by name..." value="<?= htmlspecialchars($search) ?>">
        <select name="category_id">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= $category_id == $cat['id'] ? 'selected' : '' ?>>
                    <?= $cat['category_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <table border="1" cellpadding="10" style="margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <tr class="<?= $p['stock'] < 10 ? 'low-stock' : '' ?>"> <td><?= $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td>$<?= number_format($p['price'], 2) ?></td>
                    <td><?= $p['category_name'] ?? 'Uncategorized' ?></td>
                    <td><?= $p['stock'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>