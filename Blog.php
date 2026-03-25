<?php include 'header.php'; ?>

<?php
$blog_posts = [
    [
        'title' => 'Cảm ơn vì đã không bỏ cuộc',
        'author' => 'Minh Anh',
        'role' => 'Sinh viên',
        'image' => 'Image/act-1.jpg',
        'content' => 'Ngày nhận được tin nhắn từ Quỹ, mình đã khóc nức nở. Không phải vì số tiền, mà vì biết rằng mình không hề đơn độc trên hành trình này. Những lời động viên và sự giúp đỡ vô điều kiện của các anh chị đã tiếp thêm cho mình động lực to lớn để bước tiếp...',
        'date' => '22/03/2026',
        'rotation' => '-3deg',
        'link' => 'detail.php?id=1' // Thêm link trỏ về bài viết chi tiết
    ],
    [
        'title' => 'Thư gửi các em khóa sau',
        'author' => 'Chú Quang',
        'role' => 'Ban Điều Hành',
        'image' => 'Image/act-1.jpg',
        'content' => 'Đừng bao giờ để hoàn cảnh định nghĩa con người bạn. Các em có tiềm năng lớn hơn các em tưởng rất nhiều. Cuộc sống có thể vùi dập ta bằng những thử thách khắc nghiệt, nhưng quyền lựa chọn đứng lên luôn nằm trong tay các em. Hãy cứ vững tin nhé!',
        'date' => '18/03/2026',
        'rotation' => '2deg',
        'link' => 'detail.php?id=2'
    ],
    [
        'title' => 'Góc nhỏ bình yên',
        'author' => 'Lê Hải',
        'role' => 'Sinh viên',
        'image' => 'Image/act-1.jpg',
        'content' => 'Mỗi buổi chiều ngồi tại văn phòng Quỹ, mình cảm nhận được một nguồn năng lượng rất lạ. Đó là sự thấu hiểu và sẻ chia không lời. Những mệt mỏi sau giờ học dường như tan biến khi được cùng mọi người gói từng món quà gửi lên vùng cao.',
        'date' => '10/03/2026',
        'rotation' => '-2deg',
        'link' => 'detail.php?id=3'
    ],
    [
        'title' => 'Hạnh phúc là sự sẻ chia',
        'author' => 'Cô Thảo',
        'role' => 'Ban Điều Hành',
        'image' => 'Image/act-1.jpg',
        'content' => 'Có những giá trị không nằm ở những con số, mà nằm ở sự chuyển biến trong tư duy và nụ cười của các em mỗi ngày lên lớp. Chúng tôi làm việc bằng cả trái tim, chỉ mong thấy các em trưởng thành và trở thành những người tử tế.',
        'date' => '05/03/2026',
        'rotation' => '4deg',
        'link' => 'detail.php?id=4'
    ]
];
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/blog.css">

<main class="scrapbook-container">
    <header class="scrapbook-header">
        <h1 class="scrapbook-title">Blog</h1>
        <p class="scrapbook-desc">Nơi những tâm hồn đồng điệu gửi gắm tâm tình</p>
        
        <div class="cta-wrapper">
            <button class="btn-write-handwritten"><i class="fas fa-feather-alt"></i> Gửi tâm tình của bạn</button>
        </div>
    </header>

    <section class="gallery-wall">
        <?php foreach ($blog_posts as $index => $post): ?>
            <div class="polaroid-wrapper" style="--rotation: <?php echo $post['rotation']; ?>; animation-delay: <?php echo 0.3 + ($index * 0.15); ?>s;">
                <article class="polaroid-card">
                    <div class="polaroid-image">
                        <img src="<?php echo $post['image']; ?>" alt="Kỷ niệm">
                        <div class="polaroid-label <?php echo ($post['role'] == 'Sinh viên') ? 'label-stu' : 'label-adm'; ?>">
                            <?php echo $post['role']; ?>
                        </div>
                    </div>
                    
                    <div class="polaroid-body">
                        <h2 class="polaroid-title"><?php echo $post['title']; ?></h2>
                        <p class="polaroid-text">“<?php echo $post['content']; ?>”</p>
                        <a href="<?php echo $post['link']; ?>" class="read-more-link">Xem thêm...</a>
                        
                        <div class="polaroid-footer">
                            <span class="polaroid-author">— <?php echo $post['author']; ?></span>
                            <span class="polaroid-date"><?php echo $post['date']; ?></span>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'footer.php'; ?>