<div id=middle>
<h4>Edit your listing using the form below.</h4>
<br/>
<form action="edit_listing.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="name" placeholder="Textbook name" type="text" 
            <?php print('value="'.$listing[0]["name"] .'"');?>/>
        </div>
        <div class="control-group">
            <input autofocus name="author" placeholder="Author" type="text" 
            <?php print('value="'.$listing[0]["author"] .'"');?>/>
        </div>
        <div class="control-group">
            <input autofocus name="edition" placeholder="Edition" type="text" 
            <?php print('value="'.$listing[0]["edition"] .'"');?>/>
        </div>
        <div class="control-group">
            <select autofocus name="category">
            <?php 
                print('<option selected="selected" value="'.$category[0]["category"].'">'.$category[0]["category"].'</option>');
                foreach ($dropcategories as $row)	
                {
                    print('<option value="'.$row["category"].'">'.$row['category'].'</option>');	       
                }      
            ?>
            </select>
        </div>
        <div class="control-group">
            <input autofocus name="price" placeholder="Price" type="text" 
            <?php print('value="'.$listing[0]["price"] .'"');?>/>
        </div>
        <div class="control-group">
            <input autofocus name="course" placeholder="Course name" type="text" 
            <?php print('value="'.$listing[0]["course"] .'"');?>/>
        </div>
         <div class="control-group">
            <input autofocus name="condition" placeholder="Condition" type="text" 
            <?php print('value="'.$listing[0]["condition"] .'"');?>/>
        </div>
         <div class="control-group">
            <input autofocus name="description" placeholder="Decription" type="text" 
            <?php print('value="'.$listing[0]["description"] .'"');?>/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Edit</button>
        </div>
    </fieldset>
</form>
</div>
