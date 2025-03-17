<?php 

    // var_dump($_SESSION["orderDetails"]);
    // die;

    if(isset($_SESSION["orderDetails"])) : 
        if(isset($_SESSION["errorsUpdate"])) : 
?>
            <div class="alert alert-danger"><?= $_SESSION["errorsUpdate"]; ?></div>
<?php   
        endif;
    if($_SESSION["orderDetails"] == -1) :
?>
        <div class="alert alert-warning text-center" role="alert" style="font-size: 18px; padding: 15px;">
            No orders available at the moment!
        </div>
<?php 
    else :
?>

        <div class="container mt-4">
            <h2 class="mb-3 text-center">Orders List</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Street Address</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Total Price ($)</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $row = 1;
                            // var_dump($_SESSION["orderDetails"]);
                            // die;   
                            foreach($_SESSION["orderDetails"] as $order) :
                        ?>
                            <tr>
                                <td><?= $row++; ?></td>
                                <td><?= $order["first_name"] . " " .$order["last_name"]; ?></td>
                                <td><?= $order["country"]; ?></td>
                                <td><?= $order["street_address"]; ?></td>
                                <td><?= $order["city"]; ?></td>
                                <td><?= $order["phone"]; ?></td>
                                <td><?= $order["total_price"]; ?></td>
                                <td><?= $order["name"]; ?></td>
                                <td><?= $order["quantity"]; ?></td>
                                <td>
                                    <form action="./?page=update-status" method="POST">
                                        <input type="hidden" name="order_id" value="<?= $order["id"]; ?>">
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="Processing" selected><?= $order["status"]; ?></option>
                                            <option value="Processing">Processing</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Delivered">Delivered</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?= $order["notes"]; ?></td>
                            </tr>
                        <?php 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

<?php 
    endif;
    else :
?>
        <div id="no-orders" class="alert alert-warning text-center d-none">
            <h4 class="mb-0">No orders available at the moment</h4>
        </div>
<?php 
    endif;
?>
