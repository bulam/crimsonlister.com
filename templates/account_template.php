<div id=middle>
    <h4>Your current listings</h4>
    <br/>    
    <div class="control-group">
    <table class="table table-striped" style="width: 65%; margin: 0 auto">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Price</th>            
                <th>Course</th>
                <th>Date posted</th>
            </tr>
        </thead>
        <?php	
            foreach ($rows as $row)	
            {
                print("<tr>");	           
                print("<td>{$row["name"]}</td>");	
                print("<td>{$row["author"]}</td>");
                print("<td>{$row["edition"]}</td>");
                print("<td>\${$row["price"]}</td>");
                print("<td>{$row["course"]}</td>");
                print("<td>{$row["date"]}</td>");
                $_SESSION["submissionid"] =  $row['submission'];
                print("<td><a href=\"edit_listing.php?submission=" . $row['submission'] . "\">
                <div class='control-group'>
                <button type='submit' class='btn'>Edit</button></div></a></td>");
                print("<td><a href=\"remove.php?submission=" . $row['submission'] . "\">
                <div class='control-group'>
                <button type='submit' class='btn btn-danger'>Remove</button></div></a></td>");	
                print("</tr>");	
            }	
        ?>
    </table>
</div> 
</div>
