<?php
include 'header.php';

$milestones = [
    [
        'title' => 'Thành lập Quỹ Học Bổng Đồng Hành',
        'desc' => 'Quỹ được thành lập với mục tiêu hỗ trợ học sinh, sinh viên có hoàn cảnh khó khăn.',
        'time' => 'Tháng 9, 2020'
    ],
    [
        'title' => 'Chương trình Học Bổng Đồng Hành lần 1',
        'desc' => 'Trao tặng 100 suất học bổng cho học sinh, sinh viên trên toàn quốc.',
        'time' => 'Tháng 12, 2020'
    ],
    [
        'title' => 'Mở rộng chương trình Học Bổng Đồng Hành',
        'desc' => 'Tăng số lượng học bổng lên 200 suất và mở rộng đối tượng nhận học bổng.',
        'time' => 'Tháng 6, 2021'
    ],

];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/activities.css">

<section class="hero-section" style="min-height: 300px;">
    <div class="hero-content" style="grid-template-columns: 1fr;">
        <div class="hero-tet" style="text-align: center;">
            <h1 class="hero-title" style="text-align: center;">Hoạt Động</h1>
            <p class="hero-subtitle" style="text-align: center;">Những cột mốc đáng nhớ trên hành trình phát triển của chúng tôi.</p>
        </div>
    </div>
</section>

<main class="container">
    <div class="timeline-container">
        <?php foreach ($milestones as $index => $ms): ?>
            <div class="timeline-item <?php echo ($index % 2 == 0) ? 'left' : 'right'; ?>">
                <div class="timeline-content">
                    <h3><?php echo $ms['title']; ?></h3>
                    <p><?php echo $ms['desc']; ?></p>
                    <span class="time-badge"><?php echo $ms['time']; ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>