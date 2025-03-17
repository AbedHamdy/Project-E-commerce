<?php 
    if(isset($_SESSION["errors"])) :
        foreach($_SESSION["errors"] as $error) :
?>
            <div class="alert alert-danger"><?= $error; ?></div>
<?php 
        endforeach;
        unset($_SESSION["errors"]);
    endif;
?>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-center mb-4">Add Product</h2>
            <form action="./?page=create-product" method="POST" enctype="multipart/form-data">

                <!-- Product Name -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                    <label for="name">Product Name</label>
                </div>

                <!-- Price -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                    <label for="price">Price ($)</label>
                </div>

                <!-- Discount -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount">
                    <label for="discount">Discount (%)</label>
                </div>

                <!-- Description -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="description" name="description" placeholder="Product Description" style="height: 100px"></textarea>
                    <label for="description">Product Description</label>
                </div>

                <!-- Advantages -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="advantages" name="advantages" placeholder="Product Advantages" style="height: 100px"></textarea>
                    <label for="advantages">Product Advantages</label>
                </div>

                <!-- Upload Image -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Product Image</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*" ">
                    <div class="mt-3 text-center">
                        <img id="imagePreview" src="" class="rounded" style="max-width: 200px; display: none;">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</body>