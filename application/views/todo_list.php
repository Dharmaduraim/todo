<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>

<style type="text/css">
    
#task{
        width: 360px;
        overflow: hidden;
        margin: auto;
        margin: 20 0 0 450px;
        padding: 90px;
        background: green;
        border-radius: 15px ;

}
h2{
    text-align: center;
    color: #277582;
    padding: 20px;
}
#add{
        width: 300px;
    height: 30px;
    border: none;
    border-radius: 17px;
    padding-left: 10px;
    color: blue;
}
#error{
    color: red;
align-items: center;
}


* {
  margin: 0;
  padding: 0;
  text-align:center;
}

body {
  background-color: #fafafa;
}

table {
  color: #333;
  font-size: .9em;
  font-weight: 300;
  line-height: 40px;
  border-collapse: separate;
  border-spacing: 0;
  border: 2px solid #6b3f9b;
  width: 500px;
  margin: 50px auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,.16);
  border-radius: 2px;
}

th {
  background: #6b3f9b;
  color: #fff;
  border: none;
}
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 50px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}


</style>
 
    <h2>Add New Todo</h2>
  <p>Welcome, <?php echo $this->session->userdata('username'); ?></p>   
     <div id="error"><?php echo validation_errors(); ?></div>
    <form id="task" action="<?php echo base_url('index.php/todo/add'); ?>" method="post">
        <input type="text" id="add" name="task" placeholder="Enter Task">
        <br>        <br>
        <br>

        <input id="add" type="submit" value="Add">
    </form>

<p>Log-out 
        <a href="<?php echo base_url('index.php/auth/logout/');?>">Log-out </a>
      </p>





    <h2>Todo List</h2>
<div class="col-md-12">
<?php 
if($this->session->userdata('success')){
$success = $this->session->userdata('success');
if($success != "") {
?>
<div class="alert alert-success"><?php echo $success;?></div>
<?php
 }
}
?>

<?php 
if($this->session->userdata('danger')){
$danger = $this->session->userdata('danger');
if($danger != "") {
?>
<div class="alert alert-danger"><?php echo $danger;?></div>
<?php
 }
}
?>
</div>
    <table id="">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>task</th>
                    <th>date</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete
                      <th>Action</th>
                  </tr>
                  </thead>


  
<?php
  $i=1;
  foreach($todos as $row)
  { ?>
      <tr>
            <td><?php echo $i ?></td>

      <td><?php echo $row->task ?></td>
      <td><?php echo $row->date ?></td>
      <td><?php echo $row->status ?></td>
<td><a href='todo/edit/<?php echo $row->id;?>'>update</a></td>
      <td><a href='todo/delete/<?php echo  $row->id;?>'>Delete</a>
        
                <!--Status Check-->
                  <td><?php if($row->status == "pending"){ ?>
                <a class="btn btn-success" href="<?php echo base_url()?>index.php/todo/active_status_user/<?php echo  $row->id;?>">Active</a>

                 <?php } else { ?>

            <a class="btn btn-danger" href="<?php echo base_url()?>index.php/todo/deactiv_status_user/<?php echo  $row->id;?>">Deactive</a>
                <?php }?>
                </td>
      <?php 
  $i++;
  }
  ?>

<!-- <div class="form-popup" id="myForm">
  <form action="<?php //echo base_url('index.php/todo/status/');?>" method="post" class="form-container">
    <h1>Login</h1>
<input type="text" id="fname" name="fname" value="<?php //echo $row->id; ?>">
    <label for="email"><b>Status</b></label>
     <select name="cars" id="cars">
    <option value="complete">complete</option>
    <option value="pending">pending</option>
  </select>
 <input type="submit" value="Submit">
  </form>
</div>
</table> -->



 

</body>
</html>
 

    
