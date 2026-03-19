<?php
include 'header.php';

$activities = [
    [
        'title' => 'Thông báo chương trình học bổng Đồng Hành Năm học 2025-2026',
        'image' => 'Image/act-1.jpg', 
        'date' => 'Tháng 10 13, 2025',
        'author' => 'admin',
        'excerpt' => 'I. Lời giới thiệu Quỹ học bổng Đồng Hành [...]',
        'comments' => 0,
        'link' => 'detail.php?id=1'
    ],
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/Notifications.css">

<section class="hero-section" style="min-height: 350px;">
    <div class="hero-content" style="grid-template-columns: 1fr;">
        <div class="hero-text" style="text-align: center;">
            <h1 class="hero-title" style="text-align: center;">Thông báo</h1>
            <p class="hero-subtitle" style="text-align: center;">Ghi lại những dấu ấn và hành trình chia sẻ yêu thương.</p>
        </div>
    </div>
</section>

<main class="container Introduce_contents" style="margin-bottom: 80px;">
    <div class="activities-grid">
        <?php foreach ($activities as $act): ?>
            <article class="activity-card">
                
                <a href="<?php echo $act['link']; ?>" class="activity-image-wrapper">
                    <img src="<?php echo $act['image']; ?>" alt="Hình ảnh hoạt động">
                </a>
                
                <div class="activity-content">
                    <div class="activity-date-badge">
                        <i class="far fa-calendar-alt"></i> <?php echo $act['date']; ?>
                    </div>
                    
                    <a href="<?php echo $act['link']; ?>" style="text-decoration: none;">
                        <h3 class="activity-title"><?php echo $act['title']; ?></h3>
                    </a>
                    
                    <p class="activity-excerpt"><?php echo $act['excerpt']; ?></p>
                </div>

                <div class="activity-footer">
                    <div class="author-info">
                        <i class="fas fa-user"></i> <?php echo $act['author']; ?>
                    </div>
                    <div class="comment-info">
                        <i class="fas fa-comment"></i> <?php echo $act['comments']; ?> comments
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>