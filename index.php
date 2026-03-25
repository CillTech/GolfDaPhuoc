<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Nếu đã đăng nhập (bất kỳ vai trò nào) mà quay lại trang chủ index
// thì tự động đăng xuất để quay về giao diện khách
// if (!empty($_SESSION['user_id'])) {
//     $_SESSION = [];
//     if (ini_get("session.use_cookies")) {
//         $params = session_get_cookie_params();
//         setcookie(session_name(), '', time() - 42000,
//             $params["path"], $params["domain"],
//             $params["secure"], $params["httponly"]
//         );
//     }
//     session_destroy();
//     header("Location: trang-chu");
//     exit;
// }

include "header.php";
?>

    <!-- Banner Image Section -->
    <section id="Banner">
        <img src="Image/act-1.jpg" alt="Banner" loading="eager" />
    </section>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">CLB Golf Đa Phước</h1>
                <p class="hero-subtitle">Đồng hành cùng thế hệ trẻ Đà Nẵng</p>
                <div class="hero-buttons">
                    <a href="Form_parent.php" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                        Tìm hiểu
                    </a>
                    <a href="Form_tutor.php" class="btn btn-secondary">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Tài trợ
                    </a>
                    <a href="About.php" class="btn btn-primary">
                        Biết thêm về chúng tôi
                    </a>
                </div>
            </div>
            <!-- Thống kê nổi bật -->
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Kỹ sư chuyên nghiệp</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Sinh viên thành công</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Tỷ lệ tốt nghiệp loại giỏi</div>
                </div>
            </div>
        </div>
        
        <!-- Decoration elements -->
        <div class="hero-decoration">
            <div class="floating-card card-1">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="floating-card card-2">
                <i class="fas fa-book"></i>
            </div>
            <div class="floating-card card-3">
                <i class="fas fa-star"></i>
            </div>
        </div>
    </section>
    
<?php include "footer.php"; ?>
</body>
</html>