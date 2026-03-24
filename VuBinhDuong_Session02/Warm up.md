01. Hello Strings
Sử dụng dấu chấm . để nối chuỗi (concatenation).

PHP
$name = "Alice";
$city = "Paris";
echo $name . " lives in " . $city . ".";
// Output: "Alice lives in Paris."
02. Math Ops
Thực hiện các phép toán số học cơ bản.

PHP
$x = 10;
$y = 5;
echo ($x + $y) . ", " . ($x - $y) . ", " . ($x * $y) . ", " . ($x / $y);
// Output: 15, 5, 50, 2
03. Casting
Chuyển đổi kiểu dữ liệu (Type Casting) và kiểm tra bằng gettype().

PHP
$input = '25.50';
$f = (float)$input;
$i = (int)$f;

echo gettype($f) . "(" . $f . "), " . gettype($i) . "(" . $i . ")";
// Output: float(25.5), integer(25)
04. Truthiness
Sử dụng toán tử 3 ngôi (Ternary operator) để viết code ngắn gọn hơn if/else.

PHP
$isOnline = true;
echo $isOnline ? "User is Online" : "User is Offline";
// Output: "User is Online"
05. Array Init
Khởi tạo mảng và truy cập theo chỉ số (index bắt đầu từ 0).

PHP
$fruits = ["Apple", "Banana", "Pear"];
echo $fruits[1]; // Lấy phần tử thứ hai
// Output: "Banana"
06. Sentence Builder
Sử dụng toán tử gán nối chuỗi .= để xây dựng câu văn từng bước.

PHP
$sentence = "PHP ";
$sentence .= "is ";
$sentence .= "fun";
echo $sentence;
// Output: "PHP is fun"
07. Strict Check
So sánh lỏng lẻo == (chỉ so giá trị) và so sánh nghiêm ngặt === (so cả giá trị và kiểu dữ liệu).

PHP
$a = 5;
$b = '5';

$equal = ($a == $b) ? "Equal (True)" : "Not Equal";
$identical = ($a === $b) ? "Identical" : "Identical (False)";

echo $equal . ", " . $identical;
// Output: Equal (True), Identical (False)
08. Logic Gate
Sử dụng toán tử logic && (AND) để kiểm tra nhiều điều kiện cùng lúc.

PHP
$age = 20;
$hasTicket = true;

if ($age > 18 && $hasTicket) {
    echo "Enter";
} else {
    echo "Deny";
}
// Output: "Enter"