<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Todo</title>
</head>
<body>
    <style type="text/css">
        #task{
        width: 360px;
        overflow: hidden;
        margin: auto;
        margin: 20 0 0 450px;
        padding: 90px;
        background: pink;
        border-radius: 15px ;

}
h1{
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
    </style>
    <h1>Edit Todo</h1>
    <form id="task" action="<?php echo base_url('index.php/todo/update/'.$todo->id); ?>" method="post">
        <input type="text" id="add"name="task"  required value="<?php echo $todo->task; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
