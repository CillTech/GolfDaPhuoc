<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'header.php';
include 'config.php';

$api_url = URL_BLOG;
$response = @file_get_contents($api_url);
$activities = json_decode($response, true);

if ($activities) {
    $activities = array_reverse($activities); 
} else {
    $activities = []; 
}
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/notifications.css">

<section class="hero-section" style="min-height: 200px;">
    <div class="hero-content" style="grid-template-columns: 1fr;">
        <div class="hero-text" style="text-align: center;">
            <h1 class="hero-title1" style="text-align: center;">Hoạt Động</h1>
        </div>
    </div>
</section>

<main class="container Introduce_contents" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="blog-layout">
        
        <div class="main-articles">
            <?php foreach ($activities as $act): 
                $detail_link = "detail.php?type=activities&id=" . $act['id']; 
            ?>
            <article class="horizontal-card">
                <a href="<?php echo $detail_link; ?>" class="h-card-image">
                    <img src="<?php echo $act['image']; ?>" alt="Hình ảnh hoạt động">
                </a>
                
                <div class="h-card-content">
                    <a href="<?php echo $detail_link; ?>" class="h-card-title-link">
                        <h3 class="h-card-title"><?php echo $act['title']; ?></h3>
                    </a>
                    <p class="h-card-excerpt"><?php echo $act['excerpt']; ?></p>
                </div>
            </article>
            <?php endforeach; ?>
            
            <?php if (empty($activities)): ?>
                <p style="text-align: center; color: #666; font-style: italic; padding: 20px;">
                    Hiện chưa có bài viết hoạt động nào.
                </p>
            <?php endif; ?>
        </div>

        <aside class="sidebar">
            <div class="widget">
                <h3 class="widget-title">Hoạt động mới nhất</h3>
                <div class="widget-content">
                    <?php 
                    $recent_posts = array_slice($activities, 0, 4);
                    foreach ($recent_posts as $post): 
                    ?>
                        <div class="sidebar-post">
                            <a href="detail.php?type=activities&id=<?php echo $post['id']; ?>" class="sp-image">
                                <img src="<?php echo $post['image']; ?>" alt="Thumbnail">
                            </a>
                            <div class="sp-content">
                                <a href="detail.php?type=activities&id=<?php echo $post['id']; ?>" class="sp-title">
                                    <?php echo $post['title']; ?>
                                </a>
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