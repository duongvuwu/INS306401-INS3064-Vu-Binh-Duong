01. Greeter
Hàm này nhận vào một chuỗi tên và trả về lời chào. Việc dùng : string ở cuối đảm bảo hàm này bắt buộc phải trả về một chuỗi.

PHP
function greet(string $name): string {
    return "Hello, " . $name . "!";
}
// Ví dụ: echo greet("Sam"); -> Hello, Sam!
02. Area Calc
Tính diện tích hình chữ nhật. Chúng ta dùng kiểu float để có thể tính toán chính xác cả với số thập phân.

PHP
function area(float $w, float $h): float {
    return $w * $h;
}
// Ví dụ: echo area(5.5, 2); -> 11.0
03. Adult Check
Thử thách ở đây là xử lý tham số Nullable (?int). Dấu ? có nghĩa là biến $age có thể là số nguyên hoặc là null.

PHP
function isAdult(?int $age): bool {
    // Nếu age là null hoặc nhỏ hơn 18, trả về false
    if ($age === null || $age < 18) {
        return false;
    }
    return true;
}
// Ví dụ: var_dump(isAdult(null)); -> bool(false)
04. Safe Divide
Đây là một hàm cực kỳ quan trọng trong xử lý dữ liệu để tránh lỗi "Chia cho 0" khiến hệ thống bị sập.

PHP
function safeDiv(float $a, float $b): ?float {
    if ($b == 0) {
        return null;
    }
    return $a / $b;
}
// Ví dụ: var_dump(safeDiv(10, 0)); -> NULL
05. Formatter
Sử dụng tham số mặc định (default parameter) cho ký hiệu tiền tệ. Mình sử dụng number_format để giá tiền hiện ra đúng chuẩn có 2 chữ số thập phân.

PHP
function fmt(float $amt, string $c = '$'): string {
    return $c . number_format($amt, 2);
}
// Ví dụ: echo fmt(50); -> $50.00
06. Pure Math
Một Pure Function (Hàm thuần khiết) là hàm không làm gì khác ngoài việc tính toán và trả về kết quả (không echo, không dùng biến toàn cục).

PHP
function add(int $a, int $b): int {
    return $a + $b;
}
// Ví dụ: echo add(5, 10); -> 15