<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "header.php";
include "config.php"; 

// 1. Kéo dữ liệu Hoạt động từ Sheet 'blog'
$activities_home = json_decode(@file_get_contents(URL_ACTIVITIES), true);
if ($activities_home) {
    $activities_home = array_slice(array_reverse($activities_home), 0, 4);
} else {
    $activities_home = [];
}

// 2. Kéo dữ liệu Mạnh thường quân từ Sheet 'sponsors' (Lấy 6 người)
$sponsors_home = json_decode(@file_get_contents(URL_SPONSORS), true);
if ($sponsors_home) {
    $sponsors_home = array_slice(array_reverse($sponsors_home), 0, 6);
} else {
    $sponsors_home = [];
}
?>

    <section id="Banner">
        <img src="Image/act-1.jpg" alt="Banner" loading="eager" />
    </section>
    
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">CLB Golf Đa Phước</h1>
                <p class="hero-subtitle">Đồng hành cùng thế hệ trẻ Đà Nẵng</p>
                <div class="hero-buttons">
                    <a href="Notifications.php" class="btn btn-primary"><i class="fas fa-search"></i> Thông báo</a>
                    <a href="Sponsorship.php" class="btn btn-secondary"><i class="fas fa-chalkboard-teacher"></i> Tài trợ</a>
                    <a href="About.php" class="btn btn-primary">Biết thêm về chúng tôi</a>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item"><div class="stat-number">50+</div><div class="stat-label">Kỹ sư chuyên nghiệp</div></div>
                <div class="stat-item"><div class="stat-number">100+</div><div class="stat-label">Sinh viên thành công</div></div>
                <div class="stat-item"><div class="stat-number">98%</div><div class="stat-label">Tỷ lệ tốt nghiệp loại giỏi</div></div>
            </div>
        </div>
        
        <div class="hero-decoration">
            <div class="floating-card card-1"><i class="fas fa-graduation-cap"></i></div>
            <div class="floating-card card-2"><i class="fas fa-book"></i></div>
            <div class="floating-card card-3"><i class="fas fa-star"></i></div>
        </div>
    </section>

    <div class="Introduce_contents">
        
        <section class="news-section">
            <div class="section-header-center">
                <h2 class="section-title-center">TIN TỨC HOẠT ĐỘNG</h2>
            </div>
            
            <div class="carousel-wrapper" id="activity-carousel">
                <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                <div class="carousel-track">
                    <?php 
                    if (!empty($activities_home)):
                        foreach ($activities_home as $act): 
                            $date_parts = explode('/', $act['date'] ?? '01/01/2026');
                            $day = $date_parts[0] ?? '01';
                            $month = $date_parts[1] ?? '01';
                    ?>
                        <a href="detail.php?type=activities&id=<?php echo $act['id']; ?>" class="card-item">
                            <div class="date-badge">
                                <span class="day"><?php echo $day; ?></span>
                                <span class="month">Th<?php echo $month; ?></span>
                            </div>
                            <img src="<?php echo $act['image']; ?>" alt="Hình hoạt động" class="card-image">
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $act['title']; ?></h3>
                                <p class="card-excerpt"><?php echo $act['excerpt']; ?></p>
                            </div>
                        </a>
                    <?php 
                        endforeach; 
                    else:
                        echo "<p>Chưa có dữ liệu hoạt động mới.</p>";
                    endif;
                    ?>
                </div>
                <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="carousel-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
            </div>
        </section>

        <section class="news-section mt-5" style="margin-top: 100px; padding-top: 50px;">
            <div class="section-header-center">
                <h2 class="section-title-center">TRI ÂN MẠNH THƯỜNG QUÂN</h2>
            </div>
            
            <style>
                .honor-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                    gap: 100px 30px; 
                    max-width: 1200px;
                    margin: 80px auto 20px;
                    padding: 0 10px;
                }
                .honor-plaque {
                    background: #fff;
                    border-radius: 16px;
                    padding: 90px 20px 30px; 
                    text-align: center;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
                    position: relative;
                    border-top: 6px solid var(--primary-color, #0d3b75); 
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .honor-plaque:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
                }
                .plaque-avatar {
                    width: 160px;
                    height: 160px;
                    border-radius: 50%;
                    border: 8px solid #fff; 
                    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
                    position: absolute;
                    top: -80px; 
                    left: 50%;
                    transform: translateX(-50%);
                    background: #f8fafc;
                    object-fit: cover;
                }
                .sponsor-name {
                    font-size: 1.3rem; 
                    font-weight: 800;
                    color: var(--text-primary);
                    margin-bottom: 5px;
                }
                .sponsor-contribution {
                    font-size: 1.25rem;
                    font-weight: 900;
                    color: var(--primary-color, #0d3b75);
                    background: rgba(13, 59, 117, 0.1); 
                    display: inline-block;
                    padding: 10px 30px;
                    border-radius: 30px;
                    margin-top: 15px;
                    border: 1px dashed rgba(13, 59, 117, 0.3);
                }
                .heart-icon {
                    color: #ef4444;
                    font-size: 1.8rem; 
                    margin-bottom: 10px;
                }
                @media (max-width: 600px) {
                    .honor-grid { gap: 80px 20px; grid-template-columns: 1fr;}
                    .plaque-avatar { width: 120px; height: 120px; top: -60px;}
                    .honor-plaque { padding-top: 70px;}
                }
            </style>

            <div class="honor-grid">
                <?php 
                if (!empty($sponsors_home)):
                    foreach ($sponsors_home as $sponsor): 
                ?>
                    <div class="honor-plaque">
                        <img src="<?php echo $sponsor['image']; ?>" alt="Nhà tài trợ" class="plaque-avatar">
                        <div class="heart-icon"><i class="fas fa-hand-holding-heart"></i></div>
                        
                        <h3 class="sponsor-name"><?php echo $sponsor['title']; ?></h3>
                        <p style="color: #666; font-size: 0.95rem; margin-bottom: 0;">Đã đóng góp</p>
                        
                        <div class="sponsor-contribution">
                            <?php echo $sponsor['excerpt']; ?>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                else:
                    echo "<p style='text-align:center; grid-column: 1/-1;'>Chưa có dữ liệu nhà tài trợ mới.</p>";
                endif;
                ?>
            </div>
            
            <div style="text-align: center; margin-top: 60px;">
                <a href="HonorList.php" class="btn" style="background: var(--bg-primary); color: var(--primary-color, #0d3b75); border: 2px solid var(--primary-color, #0d3b75); padding: 12px 35px; border-radius: 30px; font-weight: 800; font-size: 1.1rem; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 10px; box-shadow: var(--shadow-md);">
                     Xem Toàn Bộ Danh Sách 
                </a>
            </div>

        </section>
        
    </div>

    <script>
        // Script của Carousel Hoạt Động
        document.querySelectorAll('.carousel-wrapper').forEach(wrapper => {
            const track = wrapper.querySelector('.carousel-track');
            const prevBtn = wrapper.querySelector('.prev-btn');
            const nextBtn = wrapper.querySelector('.next-btn');
            const dotsContainer = wrapper.closest('section').querySelector('.carousel-dots');
            const dots = dotsContainer ? dotsContainer.querySelectorAll('.dot') : [];
            const scrollAmount = 320; 

            function updateDots() {
                const index = Math.round(track.scrollLeft / scrollAmount);
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }

            nextBtn.addEventListener('click', () => {
                track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                setTimeout(updateDots, 300); 
            });

            prevBtn.addEventListener('click', () => {
                track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                setTimeout(updateDots, 300);
            });

            track.addEventListener('scroll', updateDots);
        });
    </script>
    
<?php include "footer.php"; ?>
</body>
</html>