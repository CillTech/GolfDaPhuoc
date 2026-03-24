<?php
include 'header.php';

$milestones = [
    [
        'title' => 'Thành lập Quỹ Học Bổng Ươm mầm tài năng',
        'desc' => 'Quỹ được thành lập với mục tiêu hỗ trợ học sinh, sinh viên có hoàn cảnh khó khăn.',
        'time' => 'Tháng 9, 2020',
        'image' => 'Image/act-1.jpg', 
        'link' => 'detail.php?id=1'
    ],
    [
        'title' => 'Chương trình Học Bổng Ươm mầm tài năng lần 1',
        'desc' => 'Trao tặng 100 suất học bổng cho học sinh, sinh viên trên toàn quốc.',
        'time' => 'Tháng 12, 2020',
        'image' => 'Image/act-1.jpg', 
        'link' => 'detail.php?id=2'
    ],
    [
        'title' => 'Mở rộng chương trình Học Bổng Ươm mầm tài năng',
        'desc' => 'Tăng số lượng học bổng lên 200 suất và mở rộng đối tượng nhận học bổng.',
        'time' => 'Tháng 6, 2021',
        'image' => 'Image/act-1.jpg', 
        'link' => 'detail.php?id=3'
    ],
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/activities.css">

<section class="hero-section" style="min-height: 300px;">
    <div class="hero-content" style="grid-template-columns: 1fr;">
        <div class="hero-tet" style="text-align: center;">
            <h1 class="hero-title1" style="text-align: center;">Hoạt Động</h1>
        </div>
    </div>
</section>

<main class="container">
    <div class="timeline-container">
        <?php foreach ($milestones as $index => $ms): ?>
            <div class="timeline-item <?php echo ($index % 2 == 0) ? 'left' : 'right'; ?>" 
                 style="animation-delay: <?php echo 0.3 + ($index * 0.2); ?>s;">
                <div class="timeline-content">
                    
                    <a href="<?php echo $ms['link']; ?>" class="timeline-image-link">
                        <img src="<?php echo $ms['image']; ?>" alt="<?php echo $ms['title']; ?>" class="timeline-img">
                    </a>

                    <a href="<?php echo $ms['link']; ?>" style="text-decoration: none;">
                        <h3><?php echo $ms['title']; ?></h3>
                    </a>
                    
                    <p><?php echo $ms['desc']; ?></p>
                    <span class="time-badge"><?php echo $ms['time']; ?></span>
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>