<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?=  SITE_TITLE;?></title>
  <link rel="stylesheet" href="<?= BASE_URL;?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">FOLDERS</div>
        <ul class="folder_list">
        <li class="<?= isset($_GET['folder']) ? '':'active'?>">
        <a href="<?= site_url();?> ">
          <i  class="fa fa-folder"></i>All</a>
        </li>
          <?php foreach($folders as $folder):?>
          <li class="<?= (@$_GET['folder'] == $folder->id) ? 'active':''?>">
            <a href="<?= site_url("?folder= $folder->id");?>" id="<?= $folder->id?>" class="folder_id"><i class="fa fa-folder" ></i><?= $folder->name?></a>
            <a href="<?= site_url("?DeleteFolder=$folder->id");?>" onclick="return confirm('are you sure to delete this item\n<?= $folder->name?>')"  class="remove">x</a>
          </li>
          <?php endforeach;?>
     
     
        </ul>
      </div>
       <div>
       
          <input type="text" id="AddFolderInput" placeholder="Add New Folder"/>
          <button id="AddFolderbtn" class="btn clickAble">+</button>

        </div>

    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">    
       
       <input type="text" id="taskNameInput" style=' width: 100%;line-height: 30px;margin-left: 3%;' placeholder="Add New task"/>

     </div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>
          <?php if(sizeof($tasks) > 0):?>
          <?php foreach($tasks as $task):?>
            <li class="<?= $task->is_done ? 'checked' :'';?>">
            <i data-Taskid="<?= $task->id?>" class=" isDone clickAble <?= $task->is_done ? 'fa fa-check-square-o' :'fa fa-square-o';?>"></i>
   
            <span><?= $task->title;?></span>
              <div class="info">
                <span class="create-at">Create At <?= $task->created_at?></span>
                <a href="?DeleteTask=<?= $task->id?>" onclick="return confirm('are you sure to delete this item\n<?= $task->title?>')" class="remove">x</a>
              </div>
            </li>
            <?php endforeach;?>
            <?php else:?>
              <li>no task here ..</li>
              <?php endif;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./assets/js/script.js"></script>
   <script>


    // Add Folder
    $(document).ready(function(){
       $('#AddFolderbtn').click(function(e){
        var input=$('#AddFolderInput');
        var id=$('.folder_id').attr('id');
         $.ajax({
        url:"process/ajaxHandler.php",
        method:"post",
        data:{action: "addfolder",folderName:input.val(),folderid:id},
        success:function(response){
           if(response == 1){
           $('<li> <a href="'+id+'"> <i class="fa fa-folder"></i>'+input.val()+'</a></li> ').appendTo('ul.folder_list');
           }else{
         alert(response);
           }
        }
         });
       });


   // checked =is done;
     $('.isDone').click(function(e){
      var TaskID=$(this).attr('data-Taskid');
    
      $.ajax({
        url:"process/ajaxHandler.php",
        method:"post",
        data:{action: "DoneSwitch",taskId:TaskID},
        success:function(response){
         
        location.reload();
       
        }
         });
     })


    // Add tasks
     $('#taskNameInput').on('keypress',function(e){
      
     if(e.which ==13){
      $.ajax({
        url:"process/ajaxHandler.php",
        method:"post",
        data:{action: "addTask",folderId:<?= $_GET['folder'] ?? 0 ?>,taskTitle:$('#taskNameInput').val()},
        success:function(response){
           if(response == 1){
        location.reload();
           }else{
         alert(response);
           }
        }
         });
     }
     });
     $('#taskNameInput').focus();
    });
   </script>
</body>
</html>
