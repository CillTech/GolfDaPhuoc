<?php
include 'header.php';

$activities = [
    [
        'title' => 'Thông báo chương trình học bổng Ươm mầm tài năng Năm học 2025-2026',
        'image' => 'Image/act-1.jpg', 
        'date' => '13/10/2025', 
        'author' => 'Admin',
        'excerpt' => 'I. Lời giới thiệu Quỹ học bổng Ươm mầm tài năng. Quỹ được thành lập với mục tiêu hỗ trợ các em học sinh, sinh viên có hoàn cảnh khó khăn...',
        'comments' => 0,
        'link' => 'detail.php?id=1'
    ],
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/notifications.css">

<section class="hero-section" style="min-height: 200px;">
    <div class="hero-content" style="grid-template-columns: 1fr;">
        <div class="hero-text" style="text-align: center;">
            <h1 class="hero-title1" style="text-align: center;">Thông Báo</h1>
        </div>
    </div>
</section>

<main class="container Introduce_contents" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="blog-layout">
        
        <div class="main-articles">
            <?php foreach ($activities as $act): ?>
                <article class="horizontal-card">
                    <a href="<?php echo $act['link']; ?>" class="h-card-image">
                        <img src="<?php echo $act['image']; ?>" alt="Hình ảnh hoạt động">
                    </a>
                    
                    <div class="h-card-content">
                        <a href="<?php echo $act['link']; ?>" class="h-card-title-link">
                            <h3 class="h-card-title"><?php echo $act['title']; ?></h3>
                        </a>
                        
                        <div class="h-card-meta">
                            <span class="meta-item"><?php echo strtoupper($act['author']); ?></span>
                            <span class="meta-item"><i class="far fa-clock"></i> <?php echo $act['date']; ?></span>
                            <span class="meta-item"><i class="fas fa-comment"></i> <?php echo $act['comments']; ?></span>
                        </div>
                        
                        <p class="h-card-excerpt"><?php echo $act['excerpt']; ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <aside class="sidebar">
            <div class="widget">
                <h3 class="widget-title">Bài đăng mới</h3>
                <div class="widget-content">
                    <?php 
                    $recent_posts = array_slice($activities, 0, 4);
                    foreach ($recent_posts as $post): 
                    ?>
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