<?php
include 'header.php';
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "Không tìm thấy bài viết!";
    exit;
}

// 1. Lấy nội dung chi tiết của bài viết hiện tại
$api_detail = BASE_URL . "/search?id=" . $id;
$res_detail = @file_get_contents($api_detail);
$data_detail = json_decode($res_detail, true);
$article = $data_detail[0] ?? null;

if (!$article) {
    echo "Bài viết không tồn tại!";
    exit;
}

// 2. Lấy danh sách bài đăng mới cho Sidebar (Lấy toàn bộ để slice)
// Dùng lại BASE_URL (không có /search)
$res_all = @file_get_contents(BASE_URL);
$all_posts = json_decode($res_all, true);
// Đảo ngược để bài mới nhất lên đầu và lấy 4 bài
if ($all_posts) {
    $recent_posts = array_slice(array_reverse($all_posts), 0, 4);
} else {
    $recent_posts = [];
}
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/detail.css">

<main class="container" style="margin-top: 140px; margin-bottom: 80px;">
    <div class="blog-layout">
        
        <article class="article-content-wrapper">
            <img src="<?php echo $article['image']; ?>" alt="Ảnh bìa" class="article-main-image">

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
                            <a href="detail.php?id=<?php echo $post['id']; ?>" class="sp-image">
                                <img src="<?php echo $post['image']; ?>" alt="Thumbnail">
                            </a>
                            <div class="sp-content">
                                <a href="detail.php?id=<?php echo $post['id']; ?>" class="sp-title">
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