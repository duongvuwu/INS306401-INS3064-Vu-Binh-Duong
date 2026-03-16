## Part 1: Normalization

Dữ liệu thô ban đầu (0NF/1NF) chứa nhiều dư thừa (thông tin sinh viên và giảng viên bị lặp lại) và có nguy cơ xảy ra bất thường dữ liệu (Update/Delete Anomalies). Để đạt chuẩn 3NF, cấu trúc được tách thành 4 bảng độc lập như sau:

| Table Name | Primary Key | Foreign Key | Normal Form | Description |
| :--- | :--- | :--- | :--- | :--- |
| **students** | `student_id` | None | 3NF | Lưu thông tin định danh của sinh viên (`student_name`). |
| **professors** | `professor_id` | None | 3NF | Lưu thông tin giảng viên (`professor_name`, `professor_email`). |
| **courses** | `course_id` | `professor_id` | 3NF | Lưu thông tin môn học (`course_name`) và tham chiếu đến người dạy. |
| **grades** | `student_id`, `course_id` | `student_id`, `course_id` | 3NF | Bảng trung gian lưu kết quả học tập (`grade`). |

## Part 2: Relationships

- **1. AUTHOR to BOOK:** Many-to-Many (N:M). Một tác giả có thể viết nhiều cuốn sách và một cuốn sách có thể được viết bởi nhiều đồng tác giả. 
  - *Foreign Key Location:* Không đặt trực tiếp vào 2 bảng này. Cần tạo một bảng trung gian (ví dụ: `author_book_relations`) chứa `author_id` và `book_id` làm khóa ngoại. *(Lưu ý: Nếu hệ thống giả định đơn giản hóa 1 sách chỉ do 1 người viết thì sẽ là 1:N, lúc đó FK `author_id` nằm ở bảng `books`).*

- **2. CITIZEN to PASSPORT:** One-to-One (1:1). Một công dân chỉ sở hữu một hộ chiếu và một hộ chiếu cấp cho duy nhất một công dân.
  - *Foreign Key Location:* Khóa ngoại `citizen_id` nên được đặt ở bảng `passports` (kèm theo ràng buộc UNIQUE để đảm bảo tính 1:1). Vì công dân tồn tại độc lập, còn hộ chiếu phụ thuộc vào công dân đó.

- **3. CUSTOMER to ORDER:** One-to-Many (1:N). Một khách hàng có thể tạo ra nhiều đơn hàng, nhưng một đơn hàng cụ thể chỉ thuộc về một khách hàng.
  - *Foreign Key Location:* Khóa ngoại `customer_id` bắt buộc đặt ở bảng `orders` (luôn đặt FK ở bảng phía "Many").

- **4. STUDENT to CLASS:** Many-to-Many (N:M). Một học sinh có thể đăng ký nhiều lớp học, và một lớp học có thể chứa nhiều học sinh.
  - *Foreign Key Location:* Cần một bảng trung gian (ví dụ: `enrollments`) để lưu trữ khóa ngoại `student_id` và `class_id`.

- **5. TEAM to PLAYER:** One-to-Many (1:N). Một đội bóng có nhiều cầu thủ, nhưng một cầu thủ chỉ thi đấu chính thức cho một đội bóng (tại một thời điểm).
  - *Foreign Key Location:* Khóa ngoại `team_id` bắt buộc đặt ở bảng `players` (phía "Many").

  ## Part 4: Advanced Schema Design (Hospital Management)

### 1. Tables, Primary Keys (PK) & Foreign Keys (FK)
Dựa trên luồng nghiệp vụ khám chữa bệnh, hệ thống bao gồm 6 bảng sau:

| Table Name | Primary Key (PK) | Foreign Key (FK) | Relationship Type |
| :--- | :--- | :--- | :--- |
| **patients** | `id` | None | Độc lập |
| **doctors** | `id` | None | Độc lập |
| **appointments** | `id` | `patient_id`, `doctor_id` | N:1 với Patients, N:1 với Doctors |
| **prescriptions** | `id` | `appointment_id` (UNIQUE) | 1:1 với Appointments (1 lịch khám = 1 đơn thuốc) |
| **medicines** | `id` | None | Độc lập |
| **prescription_medicines**| `id` | `prescription_id`, `medicine_id` | Bảng trung gian giải quyết N:M |

### 2. Lựa chọn quy tắc ON DELETE (Task 4)
Trong hệ thống y tế, tính toàn vẹn của dữ liệu lịch sử là tối quan trọng:
- **RESTRICT (Hoặc NO ACTION):** Áp dụng cho `patient_id`, `doctor_id`, `appointment_id`. Không được phép xóa bệnh nhân, bác sĩ hoặc lịch khám nếu đã có dữ liệu liên quan (để phục vụ kiểm toán y tế).
- **CASCADE:** Chỉ áp dụng cho bảng trung gian `prescription_medicines`. Nếu một đơn thuốc bị hủy/xóa (`prescription_id` bị xóa), các dòng chi tiết thuốc của đơn đó trong bảng trung gian cũng tự động bị xóa theo để tránh dữ liệu r