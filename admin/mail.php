<?php
require_once "../core/init.php";

if (!isset($_SESSION['admin_uname']))   {
    redirect("../adminlogin.php");
    exit();
}

?>

<?php include "includes/header.php"?>


    <!-- Main content -->
    <main class="main">

        <h2 class="content-header-title">Dashboard</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Messages</li>
        </ol>

        <!-- LIST OF REGISTERED CUSTOMERS -->
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <h6>Mail Inbox</h6>
                        <div class="card-actions">
                            <a href=""><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                            <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                            <a href=""><small class="text-muted"><i class="fa fa-times"></i></small></a>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date Sent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $connect;
                            $sql = "SELECT * FROM `messages`";
                            $result = $connect->query($sql);
                            if ($result->num_rows == 0)   {
                                echo "<h6>No E-mails receieved yet!</h6>";
                            }   else {
                                    $i = 1;
                                    while ($row = $result->fetch_array()) {
                                        $id = $row['message_id'];
                                        ?>

                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['message_sender']; ?></td>
                                            <td><?php echo $row['sender_email']; ?></td>
                                            <td><?php echo $row['message_details']; ?></td>
                                            <td><?php echo $row['date_sent']; ?></td>
                                            <td>
                                                <a class="btn btn-danger" data-toggle="modal"
                                                   data-target="#deleteModal<?php echo $id ?>">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php
                                        $i++;
                                    }
                                }

                            $result->close();
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php

            global $connect;
            $sql = "SELECT * FROM `messages`";
            $result = $connect->query($sql);
            $i = 1;
            while ($row = $result->fetch_array()) {
                $id = $row['message_id'];
                ?>


            <!-- DELETE MODAL -->
            <div class="modal fade" id="deleteModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Message</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this message...</p>
                        </div>
                        <div class="modal-footer">
                            <form action="validations/delmessage.php" method="post">
                                <input type="hidden" value="<?php echo $id ?>" name="mail_id"/>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button class="btn btn-primary" name="deleteMail">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                <?php
                $i++;
            }

            $result->close();
            ?>

        </div>
        <!-- /.conainer-fluid -->
    </main>



<?php include "includes/footer.php"; ?>