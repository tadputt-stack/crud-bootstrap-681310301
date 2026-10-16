<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Minimalist Custom Style -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Minimalist Navbar -->
    <nav class="app-navbar">
        <div class="container d-flex justify-content-center align-items-center">
            <a href="index.php" class="brand-title">
                <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
                PHP CRUD Application
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        <?php
        if (isset($_GET['msg'])) {
            $msg = htmlspecialchars($_GET['msg']);
            echo "<div class='alert alert-light border alert-dismissible fade show d-flex align-items-center justify-content-between mb-4 py-2 px-3' role='alert' style='border-radius: 8px;'>
                <div><i class='fa-regular fa-circle-check text-success me-2'></i>" . $msg . "</div>
                <button type='button' class='btn-close position-static p-2' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0 fw-semibold">User List</h4>
                <p class="text-muted small mb-0">จัดการข้อมูลผู้ใช้งานในระบบ</p>
            </div>
            <a href="add_new.php" class="btn-minimal-primary">
                <i class="fa-solid fa-plus"></i> Add New
            </a>
        </div>

        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="table-minimal">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 70px;">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col" class="text-end" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `crud_681310301`";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $genderClass = 'other';
                                if (strtolower($row['gender']) === 'male') {
                                    $genderClass = 'male';
                                } elseif (strtolower($row['gender']) === 'female') {
                                    $genderClass = 'female';
                                }
                        ?>
                        <tr>
                            <td class="text-muted"><?php echo $i++; ?></td>
                            <td class="fw-medium"><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td class="text-secondary"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <span class="badge-gender <?php echo $genderClass; ?>">
                                    <?php echo htmlspecialchars($row['gender']); ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="action-btn delete" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="6" class="empty-state">
                                <i class="fa-regular fa-folder-open fs-1 d-block mb-2"></i>
                                ไม่พบข้อมูลผู้ใช้ในระบบ
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
