<div id=middle>
<h4>Post a book you would like to sell</h4>
<br/>
<form action="submit.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="name" placeholder="Textbook name" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="author" placeholder="Author" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="edition" placeholder="Edition" type="text"/>
        </div>  
        <div class="control-group">
            <select autofocus name="category" placeholder="Category">
            <?php 
                foreach ($dropcategories as $row)	
                {
                    print('<option value="'.$row["category"].'">'.$row['category'].'</option>');	       
                }      
            ?>
            </select>
        </div>
        <div class="control-group">
            <input autofocus name="price" placeholder="Price" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="course" placeholder="Course name" type="text"/>
        </div>
         <div class="control-group">
            <input autofocus name="condition" placeholder="Condition" type="text"/>
        </div>
         <div class="control-group">
            <input autofocus name="description" placeholder="Decription" class="input-xxlarge" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Submit</button>
        </div>
    </fieldset>
</form>
</div>
