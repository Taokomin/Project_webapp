<div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "webdata");

                        if (isset($_GET['stud_customer_order_id'])) {
                            $stud_customer_order_id = $_GET['stud_customer_order_id'];
                            $query = "
                                    SELECT co.*, u.unit_name, c.customer_fname
                                    FROM tb_customer_order AS co
                                    INNER JOIN tb_unit AS u ON co.ref_unit_number = u.unit_number
                                    INNER JOIN tb_customer AS c ON co.ref_customer_number = c.customer_number
                                    WHERE customer_order_id='$stud_customer_order_id'
                                    ORDER BY u.unit_number, c.customer_number ASC;
                                    ";

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_day" class="form-label">วันที่สั่ง</label>
                                        <input type="text" class="form-control" name="ref_customer_order_day" value="<?= $row['customer_order_day']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_detail" class="form-label">สินค้าที่สั่งทำ</label>
                                        <input type="text" class="form-control" name="ref_customer_order_detail" value="<?= $row['customer_order_detail']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_order_quantity" class="form-label">จำนวน</label>
                                        <input type="text" class="form-control" name="ref_customer_order_quantity" value="<?= $row['customer_order_quantity']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_unit_name" class="form-label">หน่วยนับ</label>
                                        <input type="text" class="form-control" name="ref_unit_name" value="<?= $row['unit_name']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ref_customer_fname" class="form-label">ลูกค้า</label>
                                        <input type="text" class="form-control" name="ref_customer_fname" value="<?= $row['customer_fname']; ?>" readonly>
                                    </div>
                        <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                        }

                        ?>

                    </div>
                </div>