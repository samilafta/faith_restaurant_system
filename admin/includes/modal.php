
            <?php
             $sql = "SELECT * FROM `bookings` JOIN users ON bookings.user_id = users.id JOIN staff ON bookings.staff_id = staff.staffID ORDER BY bookings.created_at DESC";
            $result = $connect->query($sql);
            while($row = $result->fetch_array()) {

                
            ?>

                <!-- detail modal -->
                <div class="modal fade" id="detailModal<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-success" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-location-arrow"></i>  View User Location</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                Display Map
                                <p> <?php echo $row['latitude']; ?></p>
                                <p><?php echo $row['longitude']; ?></p>

                                <div class="row">
                                    <div class="col-md-12 modal_body_map">
                                      <div class="location-map" id="location-map">
                                        <div style="width: 600px; height: 400px;" id="map_canvas"></div>
                                      </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /detail modal -->

                <!-- user modal -->
                <div class="modal fade" id="userModal<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-primary" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Customer Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                                <p><b>Full Name: </b> <?php echo $row['firstname']. " ".$row['lastname'] ; ?></p>
                                <p><b>Email: </b> <?php echo $row['email']; ?></p>
                                <p><b>Mobile #: </b> <?php echo $row['phone_number']; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- deliver modal -->
                <div class="modal fade" id="deliverModal<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-warning" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Assign Staff</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="validations/delivery.php">
                                    <input type="hidden" name="booking_id" value="<?php echo $row['book_id'] ?>"/>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="staff">Assign Staff</label>
                                                <select id="staff" name="staff" class="form-control">
            
                                                    <?php
                        
                                                        $sql = "SELECT * FROM `staff`";
                                                        $result1 = $connect->query($sql);
                                                        while ($row1 = $result1->fetch_array()) {
                                                        ?>
                                                        <option value="<?php echo $row1['staffID'] ?>"><?php echo $row1['full_name']. " ( ".$row1['level']." )" ?></option>
                                                        <?php  } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" name="assign">Assign</button>
                                </form>
                              
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- /deliver modal -->

                <!-- delete modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cancel Request</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <h3>Are you sure you want to cancel request</h3>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form method="post" action="validations/deleteorder.php">
                                    <input type="hidden" name="orderid" value="<?php echo $row['book_id']; ?>"/>
                                    <input type="hidden" name="ordercode" value="<?php echo $row['order_code']; ?>"/>
                                    <button class="btn btn-primary" name="deleteorder">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /delete modal -->

                <?php
            }

            ?>