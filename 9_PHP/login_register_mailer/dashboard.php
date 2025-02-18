<?php
include 'assets/common.php';
include 'assets/header.php';
include 'pdfFile.php';
checkLogin();

// Handle Delete Action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteUser($id);
    header("Location: dashboard.php?msg=deleted");
    exit();
}

// Handle Update Action
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    updateUser($id, $name, $email, $status);
    header("Location: dashboard.php?msg=updated");
    exit();
}

// Handle Create Action
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    createUser($name, $email, $password);
    header("Location: dashboard.php?msg=created");
    exit();
}

// Handle print Action
if (isset($_GET['print'])) {
    $id = $_GET['print'];
    ob_clean();
    $user = getUser($id);
    printToPDF($user);
    exit();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
        <div class="col-12">
            <h1 class="text-center mb-4">User Management</h1>
            <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-success">
                    User successfully <?php echo $_GET['msg']; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['edit'])): ?>
                <?php $user = getUser($_GET['edit']); ?>
                <div class="card mb-4">
                    <div class="card-header">
                        Edit User
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?php echo $user['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo $user['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update User</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['create'])): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        Create new user
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <button type="submit" name="create" class="btn btn-primary">Create User</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    Users List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getAllUsers();
                            foreach ($users as $row):
                            ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>

                                    <!-- Ternary Operator alert:
                                The expression $row['status'] == 1 ? 'Active' : 'Inactive' uses the ternary operator to decide what text to display:
                                If $row['status'] equals 1, it outputs "Active".
                                Otherwise, it outputs "Inactive". -->

                                    <td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                        <!-- $GET Superglobal alert: -->
                                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        <a href="?print=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Print</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="?create" class="btn btn-success">Create user</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php include 'assets/footer.php'; ?>