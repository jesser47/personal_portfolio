<?php 
require_once "user_auth.php";
$title = "Education"; 
require_once "header.php";
require_once "db.php";

// Fetching services from the database
$services_query = $dbcon->query("SELECT * FROM services");

?>

<div class="card text-dark mb-3">
    <div class="card-header bg-success text-center"><?= 'Educations' ?></div>
    <div class="card-body">

        <!-- Service add alert -->
        <?php if(isset($_SESSION['service_add'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['service_add'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['service_add']); ?>
        <?php endif; ?>
        <!-- End service add alert -->

        <!-- Service update alert -->
        <?php if(isset($_SESSION['service_update'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['service_update'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['service_update']); ?>
        <?php endif; ?>
        <!-- End service update alert -->

        <!-- Service delete alert -->
        <?php if(isset($_SESSION['service_delete'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['service_delete'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['service_delete']); ?>
        <?php endif; ?>
        <!-- End service delete alert -->

        <table id="example" class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Icon</th>
                    <th>Education Title</th>
                    <th>Education Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP foreach loop to display services -->
                <?php $serial = 1; ?>
                <?php foreach ($services_query as $result): ?>
                    <tr>
                        <td><?= $serial++ ?></td>
                        <td><i style="font-size: 28px;" class="<?= $result['icon'] ?>"></i></td>
                        <td><?= $result['title'] ?></td>
                        <td><?= $result['some_text'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning" href="service_update.php?id=<?= base64_encode($result['id']) ?>">Update</a>
                                <a class="btn btn-sm btn-danger" href="service_delete.php?id=<?= base64_encode($result['id']) ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- End foreach -->
            </tbody>
        </table>

        <a class="btn btn-block btn-success mt-2" href="service_add.php">Add Another Educations</a>

    </div>
</div>

<!-- Footer content -->
<?php require_once "footer.php"; ?>
