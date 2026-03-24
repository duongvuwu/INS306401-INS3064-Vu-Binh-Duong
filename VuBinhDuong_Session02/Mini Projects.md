01. BMI Calculator
Dự án này rèn luyện cách tính toán biểu thức toán học và phân loại dữ liệu bằng cấu trúc điều kiện.

PHP
function calculateBMI(float $kg, float $m): string {
    // Công thức: BMI = kg / (m * m)
    $bmi = round($kg / ($m * $m), 1);
    
    // Logic phân loại
    if ($bmi < 18.5) {
        $category = "Under";
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        $category = "Normal";
    } else {
        $category = "Over";
    }
    
    return "BMI: $bmi ($category)";
}

// Chạy thử
echo calculateBMI(70, 1.75); 
// Output: "BMI: 22.9 (Normal)"
02. Student List
Dự án này kết hợp mảng đa chiều với HTML để hiển thị dữ liệu lên giao diện web—một kỹ năng cực kỳ quan trọng trong phát triển web backend.

PHP
<?php
$students = [
    ['name' => 'Nguyen An', 'grade' => 90],
    ['name' => 'Tran Binh', 'grade' => 85],
    ['name' => 'Le Chi', 'grade' => 72],
    ['name' => 'Pham Duong', 'grade' => 95]
];
?>

<table border="1" cellpadding="10" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['name'] ?></td>
                <td><?= $student['grade'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
03. Prime Seeker
Đây là bài tập về thuật toán. Hàm isPrime sẽ kiểm tra tính chất của một số, sau đó vòng lặp sẽ thực hiện việc "quét" dữ liệu.

PHP
function isPrime(int $n): bool {
    if ($n < 2) return false;
    // Kiểm tra từ 2 đến căn bậc hai của n để tối ưu hiệu suất
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

echo "Prime numbers: ";
for ($i = 1; $i <= 100; $i++) {
    if (isPrime($i)) {
        echo $i . " ";
    }
}
// Output: 2 3 5 7 11 13 17...
04. Scoreboard
Dự án này tập trung vào xử lý mảng (Array Processing) để tìm kiếm các thông số thống kê.

PHP
$scores = [80, 95, 60, 75, 88, 92, 55];

// Tính toán các chỉ số cơ bản
$avg = round(array_sum($scores) / count($scores), 1);
$max = max($scores);
$min = min($scores);

// Lọc các điểm số cao hơn trung bình (Top performers)
$topPerformers = array_filter($scores, function($score) use ($avg) {
    return $score > $avg;
});

// Chuyển mảng Top về dạng chuỗi để in ra theo mẫu
$topStr = "[" . implode(", ", $topPerformers) . "]";

echo "Avg: $avg, Top: $topStr";
// Output ví dụ: "Avg: 77.9, Top: [80, 95, 88, 92]"