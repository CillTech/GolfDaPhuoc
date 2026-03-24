<?php
include 'header.php';

// Giả lập lấy ID từ URL
$id = isset($_GET['id']) ? $_GET['id'] : 1;

$article = [
    'title' => 'Phát động chương trình hỗ trợ sinh viên "Tiếp Bước Giảng Đường" 2026',
    'date' => '15/04/2026',
    'author' => 'admin',
    'image' => 'Image/act-1.jpg', 
    'category' => 'Tin tức',
    'content' => '
        <p>Chào mừng năm học mới, chúng tôi chính thức công bố chương trình hỗ trợ tài chính đặc biệt dành riêng cho các bạn học sinh, sinh viên luôn nỗ lực vươn lên trong học tập nhưng đang gặp trở ngại về kinh tế.</p>
        
        <h3>1. Mục tiêu chương trình</h3>
        <p>Chương trình không chỉ dừng lại ở việc trao tặng các gói hỗ trợ tài chính, mà chúng tôi còn mong muốn được đồng hành cùng các em thông qua các buổi định hướng nghề nghiệp, đào tạo ngoại ngữ và phát triển kỹ năng mềm hoàn toàn miễn phí.</p>
        
        <h3>2. Điều kiện tham gia</h3>
        <ul>
            <li>Sinh viên đang theo học hệ chính quy tại các trường Đại học, Cao đẳng trên toàn quốc.</li>
            <li>Có sổ hộ nghèo, cận nghèo hoặc giấy xác nhận hoàn cảnh khó khăn có mộc đỏ của địa phương.</li>
            <li>Điểm trung bình học kỳ gần nhất đạt từ Khá trở lên, điểm rèn luyện loại Tốt.</li>
        </ul>

        <h3>3. Lộ trình triển khai</h3>
        <p>Ban tổ chức sẽ bắt đầu nhận hồ sơ trực tuyến từ ngày 20/04/2026 đến hết ngày 30/05/2026. Quá trình phỏng vấn sẽ diễn ra vào đầu tháng 6 và kết quả dự kiến được công bố trước thềm năm học mới.</p>
        <p>Chúng tôi hy vọng sự tiếp sức nhỏ bé này sẽ giúp các bạn vững bước hơn trên con đường chinh phục tri thức và xây dựng tương lai.</p>
    '
];

$recent_posts = [
    [
        'title' => 'Thông báo chương trình học bổng Ươm mầm tài năng Năm học 2025-2026',
        'image' => 'Image/act-1.jpg', 
        'date' => '13/10/2025',
        'link' => 'detail.php?id=1'
    ],
    [
        'title' => 'Tổng kết chuyến đi từ thiện "Áo ấm vùng cao" tại Hà Giang',
        'image' => 'Image/act-1.jpg', 
        'date' => '05/01/2026',
        'link' => 'detail.php?id=2'
    ],
    [
        'title' => 'Danh sách 50 sinh viên xuất sắc nhận hỗ trợ tháng 3/2026',
        'image' => 'Image/act-1.jpg', 
        'date' => '10/03/2026',
        'link' => 'detail.php?id=3'
    ]
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/detail.css">

<main class="container" style="margin-top: 140px; margin-bottom: 80px;">
    
    <div class="blog-layout">
        
        <article class="article-content-wrapper">
            
            <img src="<?php echo $article['image']; ?>" alt="Ảnh bìa bài viết" class="article-main-image">

            <div class="article-meta-inline">
                <span><i class="fas fa-user"></i> <?php echo strtoupper($article['author']); ?></span>
                <span class="divider">|</span>
                <span><i class="far fa-calendar-alt"></i> <?php echo $article['date']; ?></span>
            </div>

            <h1 class="article-main-title"><?php echo $article['title']; ?></h1>

            <div class="article-body">
                <?php echo $article['content']; ?>
            </div>
            
        </article>

        <aside class="sidebar">
            <div class="widget">
                <h3 class="widget-title">Bài đăng mới</h3>
                <div class="widget-content">
                    <?php foreach ($recent_posts as $post): ?>
                        <div class="sidebar-post">
                            <a href="<?php echo $post['link']; ?>" class="sp-image">
                                <img src="<?php echo $post['image']; ?>" alt="Thumbnail">
                            </a>
                            <div class="sp-content">
                                <a href="<?php echo $post['link']; ?>" class="sp-title"><?php echo $post['title']; ?></a>
                                <span class="sp-date"><?php echo $post['date']; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

    </div>
</main>

<?php include 'footer.php'; ?>