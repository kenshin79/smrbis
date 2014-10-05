<table id="all_table" class="display condensed">
    <thead>
        <tr>
            <th>No.</th>
            <th>Category</th>
            <th>Item Name</th>
            <th>Wholesale</th>
            <th>Retail</th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $x=1;
          foreach($all_items as $row){
              echo "<tr><td>".$x."</td>";
              echo "<td>".$row->category_name."</td>";
              echo "<td>".$row->item_name."</td>";
              echo "<td>".$row->wprice."</td>";
              echo "<td>".$row->rprice."</td>";
              echo "<td>".$row->price_date."</td></tr>";
              $x++;
          }  
        ?>    
    </tbody>
</table>

