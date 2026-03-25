<?php
// Nạp header từ file có sẵn (giả sử header.php đã chứa thẻ <head> và link tới style.css)
include 'header.php';
?>

<link rel="stylesheet" href="CSS/about.css">

<section class="about-hero hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">Về Quỹ Học Bổng Chúng Tôi</h1>
            <p class="hero-subtitle">Thắp sáng ước mơ, kiến tạo tương lai. Chúng tôi đồng hành cùng những tài năng trẻ trên con đường chinh phục tri thức.</p>
        </div>
        <div class="hero-decoration">
            <div class="floating-card card-1">🌟</div>
            <div class="floating-card card-2">📚</div>
        </div>
    </div>
</section>

<main class="Introduce_contents about-main">
    
    <section class="about-section introduce-section">
        <h2 class="section-title">Giới thiệu về Quỹ</h2>
        <div class="section-content">
            <p>Quỹ học bổng được thành lập với sứ mệnh hỗ trợ các sinh viên, học sinh có hoàn cảnh khó khăn nhưng sở hữu ý chí vươn lên mạnh mẽ trong học tập.</p>
            <p>Trải qua nhiều năm hoạt động, chúng tôi tự hào đã chắp cánh cho hàng ngàn ước mơ bước giảng đường.</p>
        </div>
    </section>

    <section class="about-grid-2">
        <div class="about-card">
            <h3 class="card-title">Tôn chỉ - Mục đích</h3>
            <ul>
                <?php 
                // Lấy nội dung mảng từ file
                $principles = include 'text/principle.php'; 
                
                // In ra từng dòng
                foreach ($principles as $item) {
                    echo "<li>{$item}</li>";
                }
                ?>
            </ul>
        </div>
        <div class="about-card">
            <h3 class="card-title">Phạm vi - Đối tượng</h3>
            <ul>
                <?php 
                // Lấy nội dung mảng từ file
                $scope = include 'text/scope.php'; 
                
                // In ra từng dòng
                foreach ($scope as $item) {
                    echo "<li>{$item}</li>";
                }
                ?>
            </ul>
        </div>
    </section>

    <section class="about-section values-section">
        <h2 class="section-title center-text">Mục tiêu</h2>
        
        <div class="values-grid">
            <?php 
            // 1. Gọi dữ liệu từ file
            $target = include 'text/target.php'; 
            
            foreach ($target as $giai_doan => $danh_sach) { 
            ?>
                <div class="value-item">
                    
                    <h4>
                        <?php echo $giai_doan; ?>
                    </h4>

                    <ul>
                        <?php 
                        // 3. Vòng lặp nhỏ: Quét các dòng bên trong mỗi giai đoạn
                        foreach ($danh_sach as $key => $item) {
                            
                            // Kiểm tra nếu có list con lồng bên trong
                            if (is_array($item)) {
                                echo "<li>{$key}";
                                echo "<ul class='sub-list'>";
                                foreach ($item as $sub_item) {
                                    echo "<li>{$sub_item}</li>";
                                }
                                echo "</ul>";
                                echo "</li>";
                            } else {
                                // Nếu là dòng chữ bình thường
                                echo "<li>{$item}</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
                <?php 
            } // Kết thúc vòng lặp lớn
            ?>
        </div>
    </section>

    <section class="about-section orientation-section">
        <div class="orientation-header">
            <h2 class="section-title">Phương thức hoạt động</h2>
            <a href="#" class="btn btn-normal">Đồng hành cùng chúng tôi</a>
        </div>
        <div class="section-content">
            <ul>
                <?php 
                // Lấy nội dung mảng từ file
                $method = include 'text/method.php'; 
                
                // In ra từng dòng
                foreach ($method as $item) {
                    echo "<li>{$item}</li>";
                }
                ?>
            </ul>
        </div>
    </section>

</main>

<?php
// Nạp footer từ file có sẵn
include 'footer.php';
?>