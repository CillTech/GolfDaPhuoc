<?php
include 'header.php';
include 'config.php';

// Thay bằng URL API của bạn từ SheetDB
$api_url = URL_NOTIFICATIONS;
$response = file_get_contents($api_url);
$activities = json_decode($response, true);
if ($activities) {
    $activities = array_reverse($activities); // Đảo ngược mảng
}

// Nếu lấy dữ liệu thất bại, gán mảng rỗng
if (!$activities) $activities = [];
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
            <?php foreach ($activities as $act): 
                // Tự tạo link đến trang chi tiết bằng ID từ Sheet
                $detail_link = "detail.php?id=" . $act['id']; 
            ?>
            <article class="horizontal-card">
                <a href="<?php echo $detail_link; ?>" class="h-card-image">
                    <img src="<?php echo $act['image']; ?>" alt="Hình ảnh">
                </a>
                
                <div class="h-card-content">
                    <a href="<?php echo $detail_link; ?>" class="h-card-title-link">
                        <h3 class="h-card-title"><?php echo $act['title']; ?></h3>
                    </a>
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
                            <a href="detail.php?id=<?php echo $act['id']; ?>" class="sp-image">
                                <img src="<?php echo $act['image']; ?>" alt="Thumbnail">
                            </a>
                            <div class="sp-content">
                                <a href="detail.php?id=<?php echo $act['id']; ?>" class="sp-title">
                                    <?php echo $act['title']; ?>
                                </a>
                                <span class="sp-date"><?php echo $act['date']; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

    </div>
</main>

<?php include 'footer.php'; ?>