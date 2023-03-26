<style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

th {
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

a {
  color: #4CAF50;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>

<?php

include("connectiontest.php");
$query="select * from studentinfo ";
$data= mysqli_query($conn,$query);
$count=mysqli_num_rows($data);

if($count>0) { ?>
  <table>
    <thead>
      <tr>
        <th>SN</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Email</th>
        <th colspan="2">Operations</th>
      </tr>
    </thead>
    <tbody>
      <?php while($res=mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?php echo $res['SN']; ?></td>
          <td><?php echo $res['fname']; ?></td>
          <td><?php echo $res['lname']; ?></td>
          <td><?php echo $res['address']; ?></td>
          <td><?php echo $res['email']; ?></td>
          <td><a href='testupdate.php?SN=<?php echo $res['SN']; ?>&fname=<?php echo $res['fname']; ?>&lname=<?php echo $res['lname']; ?>&address=<?php echo $res['address']; ?>&email=<?php echo $res['email']; ?>'>Edit</a></td>
          <td><a href='testdelete.php?rn=<?php echo $res['SN']; ?>' onclick='return checkdelete()'>Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
  <p>No record found</p>
<?php } ?>
