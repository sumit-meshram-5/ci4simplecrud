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
    <div class="container">
        <br>
        <div class="card text-center m-auto">
            <div class="card-header">
                CI4 CRUD App
            </div>
            <div class="card-body">
                <h5 class="card-title">Delete Record</h5>

                <div class="message my-4">
                    <?php if (session()->getFlashData('fail')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
                    <?php endif ?>
                    <?php if (session()->getFlashData('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashData('success'); ?></div>
                    <?php endif ?>
                </div>

                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $user['id']; ?></th>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['email']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="d-block">Are you sure to Delete this record</h5>
                <a href="<?= site_url('deleteconfirm/') . $user['id'] ?>" type="button" class="btn btn-danger" name="yes">YES</a>
                <a href="<?= site_url('') ?>" type="button" class="btn btn-primary" name="no">NO</a>
            </div>
            <div class="card-footer ">
                All rights Reserved
            </div>
        </div>
    </div>
</body>

</html>