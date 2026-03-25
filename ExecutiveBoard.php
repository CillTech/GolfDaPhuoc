<?php 
include 'header.php'; 
include 'config.php';

// 1. Gọi API lấy danh sách từ tab 'bdh'
$api_url = URL_BDH;
$response = @file_get_contents($api_url);
$all_members = json_decode($response, true);

if (!$all_members) $all_members = [];

// 2. Lọc danh sách thành 2 nhóm dựa trên cột 'position'
// Nhóm Ban điều hành
$bdh_list = array_filter($all_members, function($m) {
    return trim($m['position']) === 'Ban điều hành';
});

// Nhóm Ban cố vấn
$bcv_list = array_filter($all_members, function($m) {
    return trim($m['position']) === 'Ban cố vấn';
});
?>

<link rel="stylesheet" href="CSS/about.css">
<link rel="stylesheet" href="CSS/team.css">

<main class="container team-main">
    
    <section class="team-group">
        <h2 class="section-subtitle">Ban Điều Hành</h2>
        <div class="team-grid">
            <?php foreach ($bdh_list as $member): ?>
                <?php renderMemberCard($member); ?>
            <?php endforeach; ?>
        </div>
    </section>

    <hr class="section-divider">

    <section class="team-group">
        <h2 class="section-subtitle">Ban Cố Vấn</h2>
        <div class="team-grid">
            <?php foreach ($bcv_list as $member): ?>
                <?php renderMemberCard($member); ?>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?php 
// Hàm phụ để hiển thị Card thành viên (tránh lặp code)
function renderMemberCard($member) {
    ?>
    <div class="team-card">
        <div class="member-avatar">
            <?php if (!empty($member['image'])): ?>
                <img src="<?php echo htmlspecialchars($member['image']); ?>" alt="Avatar">
            <?php else: ?>
                <div class="avatar-placeholder">
                    <?php echo mb_strtoupper(mb_substr($member['name'], 0, 1, 'UTF-8')); ?>
                </div>
            <?php endif; ?>
        </div>
        <h3 class="member-name"><?php echo htmlspecialchars($member['name']); ?></h3>
        <p class="member-role"><?php echo htmlspecialchars($member['position']); ?></p>
        <p class="member-bio"><?php echo $member['detail']; ?></p>
    </div>
    <?php
}
?>

<?php include 'footer.php'; ?>