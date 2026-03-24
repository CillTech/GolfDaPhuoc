# Sử dụng image PHP chính thức với Apache (server chạy web)
FROM php:8.2-apache

# Sao chép toàn bộ nội dung thư mục hiện tại vào thư mục web của Apache
COPY . /var/www/html/

# Cấp quyền cho thư mục web (để tránh lỗi truy cập)
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80 cho web
EXPOSE 80

# Chạy Apache ở chế độ foreground
CMD ["apache2-foreground"]