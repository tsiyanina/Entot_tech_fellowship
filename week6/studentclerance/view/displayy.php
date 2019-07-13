 <?php
       include_once './dbconnect.php';
       $db=new dbconnect();
       $conn=$db->connect();
       $query="select * from signup";//to fetch data
       $result=mySqli_query($conn,$query);//database files
       
       
        ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
            <th> Full name</th>
             <th> age</th>
              <th> phone</th>
               <th> Email</th>
            </tr>
            <?php while($row= mySqli_fetch_array($result)):;l?>
            <tr>
                <td> <?php echo $row[0];?></td>
                 <td> <?php echo $row[1];?></td>
                 <td> <?php echo $row[2];?></td>
                  <td> <?php echo $row[3];?></td>
            </tr>
            <?php endwhile;?>
        </table>
        <script>
           var row1=document.getElementByID('mytable'),rIndex:
                   for(var i=1;i<row1.rows.length;i++){
                       row1.rows[i].oncClick=function (){
                           rIndex=this.rowIndex;
                           console.log(rIndex)
                       };
                   }
        
        </script>
    </body>
</html>
