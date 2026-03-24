01. Grade Bot (if/elseif/else)
Phân loại điểm số để đánh giá kết quả.

PHP
$score = 85;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: F";
}
// Output: Grade: B
02. Day Planner (switch statement)
Chuyển đổi số từ 1-7 sang tên các ngày trong tuần.

PHP
$input = 3;

switch ($input) {
    case 1: echo "Monday"; break;
    case 2: echo "Tuesday"; break;
    case 3: echo "Wednesday"; break;
    case 4: echo "Thursday"; break;
    case 5: echo "Friday"; break;
    case 6: echo "Saturday"; break;
    case 7: echo "Sunday"; break;
    default: echo "Invalid";
}
// Output: Wednesday
03. Multi-Table (nested for-loops)Tạo ma trận nhân $5 \times 5$ đơn giản.PHPfor ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        echo ($i * $j) . " ";
    }
    echo "<br>"; // Xuống dòng sau mỗi hàng (nếu chạy trên trình duyệt)
}
04. Cart Total (foreach loop)
Duyệt mảng giá sản phẩm và tính tổng tiền bằng biến tích lũy (accumulator).

PHP
$input = [10, 20, 5];
$total = 0;

foreach ($input as $price) {
    $total += $price;
}

echo "Total: " . $total;
// Output: Total: 35
05. Countdown (while loop)
Đếm ngược từ 10 về 1 và kết thúc bằng thông báo.

PHP
$i = 10;
while ($i >= 1) {
    echo $i . ", ";
    $i--;
}
echo "Liftoff!";
// Output: 10, 9... 1, Liftoff!
06. Even Filter (for loop + modulo)
Lọc ra các số chẵn trong khoảng từ 1-20 bằng toán tử %.

PHP
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
// Output: 2, 4, 6, 8, 10, 12, 14, 16, 18, 20
07. Array Reverse (algorithm logic)
Đảo ngược mảng thủ công mà không dùng hàm array_reverse(). Đây là cách rèn luyện tư duy thuật toán rất tốt.

PHP
$input = [1, 2, 3, 4, 5];
$reversed = [];
$length = count($input);

for ($i = $length - 1; $i >= 0; $i--) {
    $reversed[] = $input[$i];
}

// In mảng kết quả
print_r($reversed);
// Output: [5, 4, 3, 2, 1]
08. FizzBuzz (conditionals)
Bài toán phỏng vấn "huyền thoại" để kiểm tra khả năng xử lý điều kiện chồng chéo.

PHP
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    } elseif ($i % 3 == 0) {
        echo "Fizz ";
    } elseif ($i % 5 == 0) {
        echo "Buzz ";
    } else {
        echo $i . " ";
    }
}