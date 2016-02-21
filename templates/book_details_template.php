<div id=middle>
<h4>Book details</h4>
<div class="control-group">
    <table class="table table-striped" style="width: 50%; margin: 0 auto">
    <?php	
            
           foreach ($listing as $row)
           {	
                print("<tr>");
                print("<td>Name</td>");	           
                print("<td>{$row["name"]}</a></td>");
                print("</tr>");		
                print("<tr>");
                print("<td>Author</td>");	
                print("<td>{$row["author"]}</td>");
                print("</tr>");
                print("<tr>");
                print("<td>Edition</td>");
                print("<td>{$row["edition"]}</td>");
                print("</tr>");
                print("<tr>");
                print("<td>Price</td>");
                print("<td>\${$row["price"]}</td>");
                print("</tr>");
                print("<tr>");
                print("<td>Course</td>");
                print("<td>{$row["course"]}</td>");
                print("</tr>");
                print("<tr>");
                print("<td>Condition</td>");
                print("<td>{$row["condition"]}</td>");		
                print("</tr>");	
                print("<tr>");
                print("<td>Description</td>");
                print("<td>{$row["description"]}</td>");		
                print("</tr>");	
                print("<tr>");
                print("<td>Date listed</td>");
                print("<td>{$row["date"]}</td>");		
                print("</tr>");	
            }
  	
    ?>
</table>
</div>
<a href="email_seller.php"><h5>Email seller</h5></a>	
</div>
