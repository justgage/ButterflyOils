<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');

if (isset($_POST)) {
   if (isset($_POST['id'])) {
      $db->set_oil($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['visible']);
      $single = $db->get_oil($_POST['id']);
   }
}

if(isset($_GET['id']))
{
   $single = $db->get_oil($_GET['id']);
}

if ($single == false) {
   echo"<h2>Invalid oil. please go back to oil list</h2>";
}
else
{

   $checked = "unchecked";
   if ($single['visible'] == true) 
   {
      $checked = "checked";
   }

?>

<script type="text/javascript" charset="utf-8">
    function submitForm(action)
    {
        document.getElementById('oils-edit').action = action;
        document.getElementById('oils-edit').submit();
    }
</script>


<form id="oils-edit" action="edit.php" method="post" accept-charset="utf-8">
<h1>Edit Oil "<?=$single['name']?>"</h1>

<div id="oils-form">
<p><input type="button" onclick="submitForm('update.php')" value="&larr; save back to oils list"></p>
   <input type="hidden" name="id" value="<?=$single['id']?>">
   <p>Price $<input type="text" name="price" value="<?=$single['price']?>"></p>
   <p>Name <input type="text" name="name" value="<?=$single['name']?>"></p>
   <p>Visable <input type="checkbox" name="visible" checked="<?=$single['visible']?>"></p>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/markdown_help.php'); ?>
   Description: <p><textarea name="description" id="description"><?=$single['description']?></textarea></p>
   <p><input type="submit" value="Save and Preview"></p>
   Preview: <blockquote><?php echo Markdown($single['description']);?></blockquote>


   </form>
      
   <br/>
   <br/>
   <br class="float-fix" />
</div> <!--oils edit -->


<?php
}//end else (if the query wasn't false)
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include//footer.php');
?>
<script type="text/javascript" charset="utf-8">

var textarea = document.getElementById("description");

textarea.onkeydown = function(){
  textarea.style.height = ""; /* Reset the height*/
  textarea.style.height = textarea.scrollHeight + "px";
}

textarea.onkeydown ();


</script>
