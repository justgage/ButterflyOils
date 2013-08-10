<?php
//var_dump($_POST);
//var_dump($_GET);
require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');

if (isset($_POST)) {
   if (isset($_POST['id'])) {
      $db->set_oil($_POST['id'], $_POST['name'], $_POST['desciption'], $_POST['price'], $_POST['visible']);
      $single = $db->get_oil($_POST['id']);
   }
}

if(isset($_GET['id']))
{
   $single = $db->get_oil($_GET['id']);
   var_dump($_GET);
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
   <div id="markdown-help">
      <h2>Markdown help</h2>
      <p>
         <em>Markdown is a way you style your text. Here is a simple guide on how to use it.</em>
      </p>
      <h3>Titles</h3>
      <p>if you want to have a title you need a # at the start of the line.</p>
      <p>for example:</p>
      <blockquote>
         <code>
            <p>#This is my title</p>
            <p>This is a line under that title</p>
         </code>
      </blockquote>

      <p>will look like this when you load the website:</p>

      <blockquote>
         <h1>This is my title</h1>
         <p>This is a line under that title</p>
      </blockquote>
      <p>use 2 of them to get a smaller title</p>
      <blockquote>
         <code>
            </p>##This is my title</p>
            <p>This is a line under that title<p>
         </code>
      </blockquote>
      <blockquote>
         <h2>This is my title</h2>
         This is a line under that title
      </blockquote>
   </div>
   Description: <p><textarea name="desciption" id="desciption"><?=$single['description']?></textarea></p>
   Preview: <blockquote><?php echo Markdown($single['description']);?></blockquote>


   <p><input type="submit" value="Save and Preview &rarr;"></p>
   </form>
      
   <br/>
   <br/>
   <br class="float-fix" />
</div> <!--oils edit -->

<script type="text/javascript" charset="utf-8">
var textarea = document.getElementById("desciption");
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
}//end else (if the query wasn't false)
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include//footer.php');
?>
