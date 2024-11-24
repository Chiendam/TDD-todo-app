# TDD-todo-app
Learn TDD with todo app simple

## Xác định các chức năng
#### 1. Thêm một task mới
#### 2. Xem danh sách các task
#### 3. Xem chi tiết một task
#### 4. Cập nhật một task
#### 5. Xóa một task

## Test cases
#### 1. Thêm một task mới
- [ ] Thêm một task mới thành công
  - input: title
  - output: task mới được thêm vào và kích thước mảng sau khi thêm mới task
- [ ] Thêm một task mới không thành công
  - input: title là rỗng
  - output: thông báo lỗi 'title cannot be empty'
#### 2. Xem danh sách các task
- [ ] Xem danh sách các task
  - input: không có
  - output: danh sách các task
- [ ] Xem danh sách các task không có task nào
  - input: không có
  - output: danh sách rỗng
#### 3. Xem chi tiết một task
- [ ] Xem chi tiết một task
  - input: index của task
  - output: task có index tương ứng
- [ ] Xem chi tiết một task không tồn tại
  - input: index của task không tồn tại
  - output: thông báo lỗi 'task not found'
#### 4. Cập nhật một task
- [ ] Cập nhật một task thành công
  - input: index của task và title mới
  - output: title task được cập nhật giống nội dung cập nhật
- [ ] Cập nhật status task
  - input: index của task và status mới
  - output: status task được cập nhật giống nội dung cập nhật
- [ ] Cập nhật một task không thành công
  - input: index của task không tồn tại
  - output: thông báo lỗi 'task not found'
- [ ] Cập nhật một task không thành công
  - input: index của task
  - output: thông báo lỗi 'Title or status must be provided'
- [ ] Cập nhật một task không thành công
  - input: index của task và title rỗng
  - output: thông báo lỗi 'title cannot be empty'
- [ ] Cập nhật một task không thành công
  - input: index của task và status không hợp lệ
  - output: thông báo lỗi 'Status not valid'
- [ ] Cập nhật một task không thành công
  - input: index của task và title là chuỗi chỉ có khoảng trắng
  - output: thông báo lỗi 'Title cannot be empty
#### 5. Xóa một task
- [ ] Xóa một task thành công
  - input: index của task
  - output: task được xóa khỏi danh sách
- [ ] Xóa một task không thành công
  - input: index của task không tồn tại
  - output: thông báo lỗi 'task not found'
  
## Cài đặt
- Run install library
``` bash
  $ omposer install
```
- Run test
``` bash
  $ php artisan serve
```
