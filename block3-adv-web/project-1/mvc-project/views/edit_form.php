 <h2>Edit Dish Information</h2>


<form class="edit-form" action="?action=update" method="post">
    <input type="hidden" name="dishID" value="<?php echo $dish['dishID']; ?>">
    <input type="hidden" name="action" value="update">
    
    <label for="dishName">Edit Dish Name:</label>
    <input type="text" id="dishName" name="dishName" value="<?php echo $dish['dishName']; ?>" required>

    <label for="price">Edit Price:</label>
    <input type="number" id="price" name="price" value="<?php echo $dish['price']; ?>" step="0.01" required>

    <button type="submit" name="submit" value="update">Update Dish</button>
</form>

