<?php 
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
?>

<header class="header">
                <a href="" class="title_1">Admin Dashboard</a>
                <div class="logout">
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
        </header>
        <aside>
                    <ul>
                        <li>
                            <a href="admission.php" class="<?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>">Admission</a>
                        </li>
                        <li>
                            <a href="add_student.php"  class="<?php echo ($current_page == 'add_student.php') ? 'active' : ''; ?>">Add Student</a>
                        </li>
                        <li>
                            <a href="view_student.php" class="<?php echo ($current_page == 'view_student.php') ? 'active' : ''; ?>">View Student</a>
                        </li>
                        <li>
                            <a href="admin_addteacher.php" class="<?php echo ($current_page == 'admin_addteacher.php') ? 'active' : ''; ?>">Add Teachers</a>
                        </li>
                        <li>
                            <a href="view_teacher.php" class="<?php echo ($current_page == 'view_teacher.php') ? 'active' : ''; ?>">View Teachers</a>
                        </li>
                        <li>
                            <a href="">Add Course</a>
                        </li>
                        <li>
                            <a href="">View Teachers</a>
                        </li>
                    </ul>
                </aside>