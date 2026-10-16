<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $sql = "INSERT INTO `crud_681310301` (first_name, last_name, email, gender) VALUES ('$first_name', '$last_name', '$email', '$gender')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=New record created successfully");
        exit();
    } else {
        $error = mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User - PHP CRUD Application</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <nav class="app-navbar">
        <div class="container d-flex justify-content-center align-items-center">
            <a href="index.php" class="brand-title">
                <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
                PHP CRUD Application
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <?php if (isset($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <div class="content-card">
                    <div class="page-header text-center mb-4">
                        <h3 class="page-title">Add New User</h3>
                        <p class="page-subtitle">กรอกข้อมูลด้านล่างเพื่อเพิ่มผู้ใช้ใหม่เข้าสู่ระบบ</p>
                    </div>

                    <form action="" method="post">
                       
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรอกชื่อจริง" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรอกนามสกุล" required>
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label" for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                        </div>

                        
                        <div class="mb-4">
                            <label class="form-label d-block">Gender</label>
                            <div class="gender-options">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" id="other" value="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>

                       
                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn-minimal-primary flex-fill justify-content-center" name="submit">
                                <i class="fa-solid fa-check"></i> Save User
                            </button>
                            <a href="index.php" class="btn-minimal-secondary flex-fill justify-content-center">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
