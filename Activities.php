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
<link rel="stylesheet" href="CSS/activities.css"> <section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title1" style="text-align: center;">Hoạt Động</h1>
    </div>
</section>

<main class="container" style="margin-bottom: 80px;">
    <div class="timeline-container">
        <?php 
        if (!empty($activities)):
            foreach ($activities as $index => $act): 
                $detail_link = "detail.php?type=activities&id=" . $act['id']; 
                // Kiểm tra chẵn lẻ để xếp so le trái - phải
                $position_class = ($index % 2 == 0) ? 'left' : 'right';
        ?>
            <div class="timeline-item <?php echo $position_class; ?>">
                <div class="timeline-content">
                    <span class="time-badge"><?php echo $act['date']; ?></span>
                    
                    <a href="<?php echo $detail_link; ?>" class="timeline-image-link" style="margin-top: 15px;">
                        <img src="<?php echo $act['image']; ?>" alt="Hình hoạt động" class="timeline-img">
                    </a>
                    
                    <a href="<?php echo $detail_link; ?>">
                        <h3><?php echo $act['title']; ?></h3>
                    </a>
                    
                    <p><?php echo $act['excerpt']; ?></p>
                </div>
            </div>
        <?php 
            endforeach; 
        else:
            echo "<p style='text-align: center; color: #666; padding: 50px 0;'>Hiện chưa có bài viết hoạt động nào.</p>";
        endif;
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>