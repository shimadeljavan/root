<?php include('view/header.php'); ?>

<section id="list" class="list">
    <header class="list_header"></header>
    <h1>Dish List</h1>
    <form action="index.php" method="get" class="list_form">
        <input type="hidden" name="action" value="list_dishs">
        <select name="vendor_id" required>
            <option value="0">view all</option>
            <?php foreach ($vendors as $vendor) : ?>
                <?php if ($vendor_id == $vendor['vendorID']) { ?>
                    <option value="<?= $vendor['vendorID'] ?>" selected>
                <?php } else { ?>
                    <option value="<?= $vendor['vendorID'] ?>">
             <?php } ?>
             <?= $vendor['vendorName'] ?>
             </option>
             <?php endforeach; ?>
        </select>
       <button type="submit" class="button">go</button>
    </form>
</header>
<?php if($dishes) { ?>
    <?php foreach($dishes as $dish) : ?>
        <div class="list_row">
            <div class="list_item">
                <p class="list_dish"><?= $dish['dishName'] ?></p>
                <p class="dish_price">$<?= $dish['price'] ?></p>
            </div>
        </div>

        <div class="list_removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_dish">
                <input type="hidden" name="dish_id" value="<?= $dish['dishID'] ?>">
                <button type="submit" class="remove-button">remove</button>
            </form>
        </div>
        </div>
        </div>
    <?php endforeach; ?>
    <?php } else { ?>
      <br>
      <?php if ($vendor_id) { ?>
        <p>There are no dishes for this vendor</p>
      <?php } else { ?>
        <p>There are no dishes</p>
      <?php } ?>
      <br>
    <?php } ?>
    
    </section>



    <section id="add" class="add">
        <h2>Add a dish</h2>
        <form action="." method="post" class="add_form" id="add_form">
            <input type="hidden" name="action" value="add_dish">
            <div class="add_inputs">
                <label>Dish Name</label>
                <select name="vendor_id" required>
                  <option value="">please select vendor</option>  
                  <?php foreach ($vendors as $vendor) : ?>
                    <option value="<?= $vendor['vendorID'] ?>">
                      <?= $vendor['vendorName'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <label for="dish_name">Price</label>
                <input type="text" name="price" id="price" required placeholder="Price">
            </div>
            <div class="add_buttonItem">
                <button type="submit" class="add-button">Add</button>
            </div>
        </form>

    </section>

    <br>
    <p><a href=".?action=list_dishs">view/ edit dish</a></p>
  
  

<?php include('view/footer.php'); ?>