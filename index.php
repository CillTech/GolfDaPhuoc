<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "header.php";
include "config.php"; // Nhớ gọi config để có link API

// 1. Kéo dữ liệu 4 Hoạt động mới nhất từ Sheet 'blog'
$activities_home = json_decode(@file_get_contents(URL_BLOG), true);
if ($activities_home) {
    $activities_home = array_slice(array_reverse($activities_home), 0, 4);
} else {
    $activities_home = [];
}

// 2. Kéo dữ liệu 4 Mạnh thường quân mới nhất từ Sheet 'sponsors'
$sponsors_home = json_decode(@file_get_contents(URL_SPONSORS), true);
if ($sponsors_home) {
    $sponsors_home = array_slice(array_reverse($sponsors_home), 0, 4);
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
                    <a href="Notifications.php" class="btn btn-primary">
                        <i class="fas fa-search"></i> Thông báo
                    </a>
                    <a href="Sponsorship.php" class="btn btn-secondary">
                        <i class="fas fa-chalkboard-teacher"></i> Tài trợ
                    </a>
                    <a href="About.php" class="btn btn-primary">
                        Biết thêm về chúng tôi
                    </a>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Kỹ sư chuyên nghiệp</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Sinh viên thành công</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Tỷ lệ tốt nghiệp loại giỏi</div>
                </div>
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
                            // Tách ngày tháng để đưa vào cái Badge tròn tròn
                            // Giả sử ngày trong sheet format là 25/03/2026
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

        <section class="news-section mt-5">
            <div class="section-header-center">
                <h2 class="section-title-center">TRI ÂN MẠNH THƯỜNG QUÂN</h2>
            </div>
            
            <div class="carousel-wrapper" id="sponsor-carousel">
                <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                
                <div class="carousel-track">
                    <?php 
                    if (!empty($sponsors_home)):
                        foreach ($sponsors_home as $sponsor): 
                    ?>
                        <a href="detail.php?type=sponsors&id=<?php echo $sponsor['id']; ?>" class="card-item">
                            <img src="<?php echo $sponsor['image']; ?>" alt="Nhà tài trợ" class="card-image">
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $sponsor['title']; ?></h3>
                                <p class="card-excerpt"><?php echo $sponsor['excerpt']; ?></p>
                            </div>
                        </a>
                    <?php 
                        endforeach; 
                    else:
                        echo "<p>Chưa có dữ liệu nhà tài trợ mới.</p>";
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
        
    </div>

    <script>
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