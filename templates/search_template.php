<div id=middle>

    <div class="control-group">
<table class="table table-striped" style="width: 50%; margin: 0 auto">
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
            print("<td><a href=\"book_details.php?submission=" . $row["submission"] . "\">{$row["name"]}</a></td>");	
            print("<td>{$row["author"]}</td>");
            print("<td>{$row["edition"]}</td>");
            print("<td>\${$row["price"]}</td>");
            print("<td>{$row["course"]}</td>");
            print("<td>{$row["date"]}</td>");		
            print("</tr>");	
        }	
    ?>
</table>
</div> 

</div>  
