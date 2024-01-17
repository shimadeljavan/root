<?php include('view/header.php'); ?>
<?php if($vendors) {?>
<section id="list" class="list">
<header class="list_row list_header">
    <h1>Vendors List</h1>
</header>

<?php foreach($vendors as $vendor) : ?>
    <div class="list_row">
        <div class="list_item">
            <p class="list_vendor"><?= $vendor['vendorName'] ?></p>
        </div>
        <div class="list_removeItem">
            <form action="" method="post" id="add_form" class="add_form">
                <input type="hidden" name="action" value="delete_vendor">
                <input type="hidden" name="vendor_id" value="<?= $vendor['vendorID'] ?>">
                <button type="submit" class="remove-button">remove</button>
            </form>
        </div>
    </div>

    <?php endforeach; ?>

</section>

<?php } else { ?>
<p>There are no vendors</p>

<?php } ?>


<section id="add" class="add">
    <h2>Add a vendor</h2>
    <form action="" method="post" class="add_form" id="add_form">
        <input type="hidden" name="action" value="add_vendor">
        <div class="add_inputs">
            <label>Vendor Name:</label>
            <input type="text" name="vendor_name" id="vendor_name" required>
        </div>
        <div class="add__addItem">
            <button type="submit" class="add-button">Add</button>
        </div>
    </form>
</section>

<br>
<p><a href=".?action=list_dish">view/ add dishes</a></p>
<?php include('view/footer.php'); ?>