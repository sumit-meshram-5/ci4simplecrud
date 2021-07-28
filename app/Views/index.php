<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 curd</title>

    <!-- bootstrap cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <style>
        @media only screen and (max-width: 590px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                text-align: left;
                left: 50px;

            }

            td:before {
                /* Now like a table header */
                position: absolute;
                left: -40px;
                width: 27%;
            }

            /* Label the data */
            td:nth-of-type(1):before {
                content: "Name";
            }

            td:nth-of-type(2):before {
                content: "Email";
            }
        }
    </style>

</head>

<body>
    <!-- main content -->
    <div class="container">
        <br>
        <div class="card text-center m-auto">
            <div class="card-header">
                CI4 CRUD App
            </div>
            <div class="card-body">
                <h5 class="card-title">User Records<a href="<?= site_url('add') ?>" class="btn btn-primary float-end ">Add Records</a></h5>
                <div class="message my-4">
                    <?php if (session()->getFlashData('fail')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
                    <?php endif ?>
                    <?php if (session()->getFlashData('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashData('success'); ?></div>
                    <?php endif ?>
                </div>
                <div class="float-start">
                    <form action="<?= route_to('home') ?>" method="get">
                        <select name="limit" id="limit" >
                            <option value="5" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == '5' ? 'selected' : ''  ?> >5</option>
                            <option value="10" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == '10' ? 'selected' : ''  ?>  >10</option>
                            <option value="15" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == '15' ? 'selected' : ''  ?> >15</option>
                            <option value="all" <?= isset($_REQUEST['limit']) && $_REQUEST['limit'] == 'all' ? 'selected' : ''  ?> >All</option>
                        </select>
                        <button type="submit" name="page" value="1" class="btn btn-primary">Set Records per page</button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($allUsers)) : ?>
                            <?php foreach ($allUsers as  $row) : ?>
                                <tr>
                                    <th scope="row"><?= $row['id']; ?></th>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td>
                                        <a href="<?= site_url('update/') . $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="<?= site_url('delete/') . $row['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="">
                    <?= $pager->links('default', 'pagination_coustom') ?>
                </div>
            </div>
            <div class="card-footer ">
                All rights Reserved
            </div>
        </div>
    </div>


</body>

</html>