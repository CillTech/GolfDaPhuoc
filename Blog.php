<?php include 'header.php'; ?>
<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/blog.css">

<main class="blog-wrapper">
    
    <section class="blog-scroll-area">
        <div class="feed-container">
            
            <?php 
            // Giả lập mảng dữ liệu bài viết để test scroll
            $dummy_posts = [
                [
                    "name" => "Nguyễn Hoàng Nam",
                    "time" => "Vừa xong",
                    "content" => "Chào mọi người! Đây là bài viết đầu tiên trên blog mới của chúng ta. Giao diện nhìn xịn xò quá!",
                    "likes" => 2,
                    "comments" => 0
                ],
                [
                    "name" => "Trần Thị Mai",
                    "time" => "15 phút trước",
                    "content" => "Hôm nay thời tiết đẹp quá, rất thích hợp để ngồi code và uống một tách cà phê. Mọi người đang làm dự án gì thế? Chia sẻ cùng nhau nhé. <br><br>Chúc cả nhà một ngày làm việc hiệu quả!",
                    "likes" => 14,
                    "comments" => 3
                ],
                [
                    "name" => "Lê Văn Luyện... Code",
                    "time" => "1 giờ trước",
                    "content" => "Có ai rành về ReactJS không? Mình đang bị kẹt ở phần xử lý state với Redux, debug mãi từ sáng giờ chưa ra. Cứ mỗi lần dispatch action là component không chịu re-render. Ai cứu với",
                    "likes" => 5,
                    "comments" => 12
                ],
                [
                    "name" => "Quỹ Học Bổng (Admin)",
                    "time" => "3 giờ trước",
                    "content" => "Thông báo: Đã có danh sách xét duyệt học bổng tháng này. Các bạn sinh viên vui lòng kiểm tra email để cập nhật thông tin chi tiết nhé. Xin cảm ơn sự đồng hành của các mạnh thường quân!",
                    "likes" => 156,
                    "comments" => 24
                ],
                [
                    "name" => "Đinh Tuấn Anh",
                    "time" => "Hôm qua lúc 20:00",
                    "content" => "Một chút góc làm việc tối nay. Đam mê không bao giờ tắt!",
                    "likes" => 42,
                    "comments" => 8
                ]
            ];

            foreach ($dummy_posts as $post): 
            ?>
            <article class="fb-post-card">
                <div class="fb-post-header">
                    <div class="fb-avatar"></div> <div class="fb-post-info">
                        <a href="#" class="fb-username"><?php echo $post['name']; ?></a>
                        <span class="fb-post-time"><?php echo $post['time']; ?> · Công khai</span>
                    </div>
                    <div class="fb-post-options"></div>
                </div>

                <div class="fb-post-content">
                    <p><?php echo $post['content']; ?></p>
                </div>

                <div class="fb-post-stats">
                    <span class="stat-likes"><?php echo $post['likes']; ?> Thích</span>
                    <span class="stat-comments"><?php echo $post['comments']; ?> bình luận</span>
                </div>

                <div class="fb-post-actions">
                    <button class="action-btn"> Thích</button>
                    <button class="action-btn"> Bình luận</button>
                    <button class="action-btn"> Chia sẻ</button>
                </div>
            </article>
            <?php endforeach; ?>

        </div>
    </section>

    <section class="post-footer-bar">
        <form action="process_post.php" method="POST" enctype="multipart/form-data" class="mini-post-form">
            <div class="input-group">
                <div class="fb-avatar mini-avatar"></div>
                <input type="file" name="image" id="file-upload" hidden>
                
                <textarea name="content" rows="1" placeholder="Viết bình luận hoặc bài mới..." required></textarea>
                
                <label for="file-upload" class="attach-text" title="Đính kèm ảnh">
                    Ảnh
                </label>
                <button type="submit" class="send-btn">
                    Đăng
                </button>
            </div>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>