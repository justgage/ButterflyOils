<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');


if (isset($_POST)) {
   if (isset($_POST['id'])) {
      $db->set_page($_POST['id'], $_POST['name'], $_POST['content']);
      $single = $db->get_page($_POST['id']);
   }
}

if(isset($_GET['id']))
{
   $single = $db->get_page($_GET['id']);
}

if ($single == false) {
   echo"<h2>Invalid page. please go back to page list</h2>";
}
else
{

?>

<script type="text/javascript" charset="utf-8">
    function submitForm(action)
    {
        document.getElementById('pages-edit').action = action;
        document.getElementById('pages-edit').submit();
    }
</script>


<form id="pages-edit" action="edit.php" method="post" accept-charset="utf-8">
<h1>Edit page</h1>

<div id="pages-form">
<p><input type="button" onclick="submitForm('update.php')" value="&larr;save back to list"></p>
   <input type="hidden" name="id" value="<?=$single['id']?>">
   <p>Name <input type="text" name="name" value="<?=$single['name']?>"></p>
   Content: <p><textarea name="content" id="content"><?=$single['content']?></textarea></p>
   <p><input type="submit" value="Save and Preview"></p>
   </form>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/markdown_help.php');
?>
      
</div> <!--page edit -->

<script type="text/javascript" charset="utf-8">
var textarea = document.getElementById("content");
var limit = 200;

textarea.onkeydown = function(){
   textarea.style.height = "";
   textarea.style.height = Math.min(textarea.scrollHeight, 300) + 30 + "px";
}


//set the height when the page loads
textarea.style.height = "";
textarea.style.height = Math.min(textarea.scrollHeight, 300) + 30 + "px";

</script>

<?php
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include//footer.php');
?>

