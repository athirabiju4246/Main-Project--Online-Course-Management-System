 
          <!DOCTYPE html>
               <style>
                th {
            height: 50px;
            vertical-align: bottom;
          }
          td {
            height: 50px;
            vertical-align: bottom;
          }
          .button {
            background: linear-gradient(120deg,#FFEFD5 , #8e44ad);
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
          }
          </style>
          
          <body>
           
              <h1 align="center">Course List</h1>
              <a href="#" class="button" style = "position:relative; left:990px; top:1px;">Add Course</a>
              <table style="width:75%"cellpadding="10" cellspacing="4" border="1" align="center">
                        
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Subject Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Fees</th>
                            <th>Description</th>
                        </tr>
                    
                        
                        <?php
                        include 'config.php';
                        $query=mysqli_query($conn,"select * from tbl_courseadd");
                        
          $cnt=1;
          while($row=mysqli_fetch_array($query))
          {
          ?>                                  
                        <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($row['cname']);?></td>
                            <td><?php echo htmlentities($row['subcode']);?></td>
                            <td><?php echo htmlentities($row['cstart']);?></td>
                            <td> <?php echo htmlentities($row['cend']);?></td>
                            <td><?php echo htmlentities($row['fees']);?></td>
                            <td><?php echo htmlentities($row['description']);?></td>
                                               
                        
                        </tr>
                        <?php $cnt=$cnt+1; } ?>
                        
                </table>
          
          </body>
          </html>
          
          