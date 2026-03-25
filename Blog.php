<?php 
include 'header.php'; 
include 'config.php';

// 1. Lấy dữ liệu từ tab blog
$api_url = URL_BLOG;
$response = @file_get_contents($api_url);
$blog_posts = json_decode($response, true);

if (!$blog_posts) $blog_posts = [];

// Đảo ngược mảng để bài mới nhất hiện lên đầu
$blog_posts = array_reverse($blog_posts);
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
        <?php foreach ($blog_posts as $index => $post): 
            // ĐƯA HÀM RAND VÀO ĐÂY: Mỗi vòng lặp sẽ tạo một số ngẫu nhiên mới
            // Ngẫu nhiên từ -3 đến 3 độ để nghiêng nhẹ nhàng
            $random_rotation = rand(-3, 3) . 'deg';
        ?>
            <div class="polaroid-wrapper" style="--rotation: <?php echo $random_rotation; ?>; animation-delay: <?php echo 0.3 + ($index * 0.15); ?>s;">
                <article class="polaroid-card">
                    <div class="polaroid-image">
                        <img src="<?php echo $post['image']; ?>" alt="Kỷ niệm">
                        <?php 
                            $label_class = ($post['role'] == 'Sinh viên') ? 'label-stu' : 'label-adm';
                        ?>
                        <div class="polaroid-label <?php echo $label_class; ?>">
                            <?php echo $post['role']; ?>
                        </div>
                    </div>
                    
                    <div class="polaroid-body">
                        <h2 class="polaroid-title"><?php echo $post['title']; ?></h2>
                        <p class="polaroid-text">“<?php echo $post['excerpt']; ?>”</p>
                        <a href="detail_blog.php?id=<?php echo $post['id']; ?>" class="read-more-link">Xem thêm...</a>
                        
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