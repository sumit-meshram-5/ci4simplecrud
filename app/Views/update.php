<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 CRUD</title>

    <!-- google fonts -->

    <!-- bootstrap cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>



</head>

<body>
    <div class="container">
        <!-- form card -->
        <br>
        <div class="card text-center m-auto">
            <div class="card-header">
                CI4 CRUD App
            </div>
            <div class="card-body">

                <div class="message my-4">
                    <?php if (session()->getFlashData('fail')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
                    <?php endif ?>
                    <?php if (session()->getFlashData('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashData('success'); ?></div>
                    <?php endif ?>
                </div>
                <h5 class="card-title">Edit the Form</h5>
                <!-- form -->
                <form action="<?= site_url('updateconfirm/') . $user['id']; ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <span class="text-danger ml-1">
                            <?php if (isset($error['name'])) :
                                echo $error['name'];
                            endif; ?>
                        </span>
                        <input type="text" class="form-control" id="name" name="name" value=<?php if (isset($user['name'])) {
                                                                                                echo  $user['name'];
                                                                                            } else {
                                                                                                echo set_value('name');
                                                                                            } ?>>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <span class="text-danger ml-1">
                            <?php if (isset($error['email'])) :
                                echo $error['email'];
                            endif; ?>
                        </span>
                        <input type="text" class="form-control" id="email" name="email" value=<?php if (isset($user['email'])) {
                                                                                                    echo  $user['email'];
                                                                                                } else {
                                                                                                    echo set_value('email');
                                                                                                } ?>>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <a href="<?= site_url() ?>" class="btn btn-primary" name="back">Back</a>
                </form>
            </div>
            <div class="card-footer">
                All rights Reserved
            </div>
        </div>
    </div>
</body>

</html>