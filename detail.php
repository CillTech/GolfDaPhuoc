<?php
include 'header.php';

// GIẢ LẬP LẤY ID TỪ URL (Ví dụ: chitiet.php?id=1)
// Nếu có database, bạn sẽ viết câu SQL SELECT * FROM baiviet WHERE id = $id
$id = isset($_GET['id']) ? $_GET['id'] : 1;

// Giả lập dữ liệu của bài viết cụ thể
$article = [
    'title' => 'Thông báo chương trình học bổng Ươm mầm tài năng Năm học 2025-2026',
    'date' => 'Tháng 10 13, 2025',
    'author' => 'admin',
    'image' => 'Image/act-1.jpg', // Đảm bảo đường dẫn này đúng với thư mục của bạn
    'category' => 'Học bổng',
    'content' => '
        <p><strong>I. Lời giới thiệu Quỹ học bổng Ươm mầm tài năng</strong></p>
        <p>Quỹ học bổng được thành lập với sứ mệnh hỗ trợ các sinh viên, học sinh có hoàn cảnh khó khăn nhưng sở hữu ý chí vươn lên mạnh mẽ trong học tập. Trải qua nhiều năm hoạt động, chúng tôi tự hào đã chắp cánh cho hàng ngàn ước mơ bước giảng đường.</p>
        
        <h3>II. Đối tượng nhận học bổng</h3>
        <ul>
            <li>Sinh viên năm thứ nhất, thứ hai, thứ ba tại các trường Đại học đối tác của Quỹ.</li>
            <li>Có hoàn cảnh gia đình khó khăn, thu nhập thấp.</li>
            <li>Có thành tích học tập tốt (Điểm trung bình tích lũy từ 7.0/10 hoặc 3.0/4.0 trở lên).</li>
            <li>Chưa nhận học bổng từ các tổ chức khác trong cùng năm học.</li>
        </ul>

        <h3>III. Giá trị học bổng</h3>
        <p>Mỗi suất học bổng bao gồm hỗ trợ tài chính trị giá <strong>4.500.000 VNĐ/học kỳ</strong> và cơ hội tham gia các khóa đào tạo kỹ năng mềm do Quỹ tổ chức miễn phí.</p>

        <h3>IV. Cách thức và thời hạn đăng ký</h3>
        <p>Hồ sơ vui lòng nộp trực tuyến qua cổng thông tin của Quỹ hoặc nộp trực tiếp tại văn phòng Đoàn Thanh Niên - Hội Sinh Viên của trường.</p>
        <p><strong>Thời hạn cuối cùng nhận hồ sơ:</strong> 23:59 ngày 30/10/2025.</p>
    '
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/detail.css">

<section class="hero-section" style="min-height: 250px; padding: 60px 20px;">
    <div class="hero-content" style="grid-template-columns: 1fr; text-align: center;">
        <div class="hero-text">
            <h1 class="hero-title" style="font-size: 2.5rem; text-align: center;">
                <?php echo $article['title']; ?>
            </h1>
        </div>
    </div>
</section>

<div class="back-button-container">
    <a href="Notifications.php" class="btn-back">
        <i class="fas fa-arrow-left"></i> Quay lại danh sách thông báo
    </a>
</div>

<main class="article-container">
    
    <div class="article-meta" style="margin-top: 30px;">
        <span class="badge"><?php echo $article['category']; ?></span>
        <span><i class="far fa-calendar-alt"></i> <?php echo $article['date']; ?></span>
        <span><i class="fas fa-user"></i> Đăng bởi: <?php echo $article['author']; ?></span>
    </div>

    <img src="<?php echo $article['image']; ?>" alt="Ảnh bìa bài viết" class="article-featured-image">

    <div class="article-body">
        <?php echo $article['content']; ?>
    </div>

</main>

<?php
// Nạp footer
include 'footer.php';
?>