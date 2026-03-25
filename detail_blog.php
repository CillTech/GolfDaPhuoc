<?php
include 'header.php';
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "Không tìm thấy bài viết!";
    exit;
}

// 1. Lấy chi tiết bài viết
$api_detail = BASE_URL . "/search?id=" . $id . "&sheet=blog";
$res_detail = @file_get_contents($api_detail);
$data_detail = json_decode($res_detail, true);
$article = $data_detail[0] ?? null;

if (!$article) {
    echo "Bài viết không tồn tại!";
    exit;
}

// 2. Lấy danh sách bài gần đây cho Sidebar
$res_all = @file_get_contents(URL_BLOG);
$all_posts = json_decode($res_all, true);
$recent_posts = [];
if ($all_posts) {
    // Lọc bỏ bài hiện tại, lấy 4 bài mới nhất
    $filtered = array_filter(array_reverse($all_posts), fn($p) => $p['id'] != $id);
    $recent_posts = array_slice(array_values($filtered), 0, 4);
}

// 3. Xác định badge role
$label_class = ($article['role'] == 'Sinh viên') ? 'badge-stu' : 'badge-adm';

// 4. Lấy chữ cái đầu tên tác giả làm avatar placeholder
$author_initial = mb_strtoupper(mb_substr($article['author'], 0, 1, 'UTF-8'), 'UTF-8');
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/detail_blog.css">

<main class="journal-page">
    <div class="journal-layout">

        <!-- ===== PHẦN CHÍNH: BÀI VIẾT ===== -->
        <div class="journal-article">

            <!-- Ảnh bìa dán như polaroid -->
            <div class="journal-cover-image">
                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="Ảnh bìa bài viết">
            </div>

            <!-- Thân bài - tờ giấy vở kẻ ngang -->
            <div class="journal-body-paper">

                <!-- Tờ giấy ghi chú nhỏ trang trí (ẩn trên mobile) -->
                <div class="quote-sticker">
                    <i class="fas fa-heart" style="color:#e67e22;"></i>
                    <br>
                    <?php
                    // Trích vài chữ đầu làm quote trang trí
                    $short_excerpt = mb_substr(strip_tags($article['excerpt'] ?? $article['content']), 0, 55, 'UTF-8');
                    echo htmlspecialchars($short_excerpt) . "...";
                    ?>
                </div>

                <!-- Meta: tác giả, ngày, nhãn vai trò -->
                <div class="journal-meta">
                    <span class="journal-role-badge <?php echo $label_class; ?>">
                        <?php echo htmlspecialchars($article['role']); ?>
                    </span>
                    <span class="journal-author-name">
                        <i class="fas fa-feather-alt" style="font-size:0.9rem;color:#e67e22;margin-right:5px;"></i>
                        <?php echo htmlspecialchars($article['author']); ?>
                    </span>
                    <span class="journal-date-stamp">
                        <i class="far fa-calendar-alt"></i>
                        <?php echo htmlspecialchars($article['date']); ?>
                    </span>
                </div>

                <!-- Tiêu đề bài viết -->
                <h1 class="journal-title">
                    <?php echo htmlspecialchars($article['title']); ?>
                </h1>

                <!-- Nội dung bài viết -->
                <div class="journal-content-wrap">
                    <div class="journal-content">
                        <?php echo $article['content']; ?>
                    </div>
                </div>

                <!-- Nút hành động: Quay lại + Chia sẻ -->
                <div class="journal-actions">
                    <a href="Blog.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Quay lại Blog
                    </a>
                    <div class="share-group">
                        <span>Chia sẻ:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>"
                           target="_blank" class="share-btn" title="Chia sẻ Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($article['title']); ?>"
                           target="_blank" class="share-btn" title="Chia sẻ Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="mailto:?subject=<?php echo urlencode($article['title']); ?>&body=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>"
                           class="share-btn" title="Gửi qua Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

            </div><!-- /.journal-body-paper -->
        </div><!-- /.journal-article -->


        <!-- ===== SIDEBAR ===== -->
        <aside class="journal-sidebar">

            <!-- Widget: Về tác giả -->
            <div class="author-card">
                <div class="author-avatar-placeholder">
                    <?php echo $author_initial; ?>
                </div>
                <p class="author-card-name"><?php echo htmlspecialchars($article['author']); ?></p>
                <p class="author-card-role"><?php echo htmlspecialchars($article['role']); ?></p>
            </div>

            <!-- Widget sticky note 1: Bài đăng gần đây -->
            <?php if (!empty($recent_posts)): ?>
            <div class="sticky-note-widget">
                <h3 class="widget-heading"><i class="fas fa-thumbtack"></i> Tâm tình khác</h3>
                <?php foreach ($recent_posts as $post): ?>
                    <a href="detail_blog.php?id=<?php echo $post['id']; ?>" class="recent-post-item">
                        <div class="rp-thumb">
                            <img src="<?php echo htmlspecialchars($post['image']); ?>"
                                 alt="<?php echo htmlspecialchars($post['title']); ?>">
                        </div>
                        <div class="rp-info">
                            <p class="rp-title"><?php echo htmlspecialchars($post['title']); ?></p>
                            <span class="rp-date">
                                <i class="far fa-clock" style="font-size:0.7rem;"></i>
                                <?php echo htmlspecialchars($post['date']); ?>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Widget sticky note 2: Gửi tâm tình -->
            <div class="sticky-note-widget" style="text-align:center;">
                <h3 class="widget-heading"><i class="fas fa-pen-nib"></i> Bạn muốn chia sẻ?</h3>
                <p style="font-family:'Lato',sans-serif;font-size:0.9rem;color:#666;margin-bottom:18px;line-height:1.6;">
                    Hãy để lại tâm tình của bạn cho những người đồng điệu nhé!
                </p>
                <a href="blog.php" style="
                    display:inline-block;
                    background:#2c3e50;
                    color:#fff;
                    padding:10px 22px;
                    border-radius:50px;
                    text-decoration:none;
                    font-size:0.9rem;
                    font-weight:700;
                    font-family:'Lato',sans-serif;
                    box-shadow:4px 4px 12px rgba(0,0,0,0.15);
                    transition:all 0.3s ease;
                " onmouseover="this.style.transform='scale(1.05) rotate(-2deg)'"
                   onmouseout="this.style.transform='scale(1) rotate(0deg)'">
                    <i class="fas fa-feather-alt"></i> Gửi tâm tình
                </a>
            </div>

        </aside><!-- /.journal-sidebar -->

    </div><!-- /.journal-layout -->
</main>

<?php include 'footer.php'; ?>
