<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');
?>

<script type="text/javascript" charset="utf-8">
    function submitForm(action)
    {
        document.getElementById('oils-form').action = action;
        if (action.search("delete") == -1) {
          document.getElementById('oils-form').submit();
        }
        else if (confirm("Are you sure you want to delete these pages?\n\n These will be gone forever!"))  {
          document.getElementById('oils-form').submit();
        }
    }
</script>


<h1>Oils Management</h1>
<div id="oil-list">

<h2>Pages</h2>

<form id="oils-form" action="#" method="get" accept-charset="utf-8">

<input type="button" onclick="submitForm('pages/add.php')" value="new page" />
<input type="button" onclick="submitForm('pages/delete.php')" value="delete" />

<table id='page-list'>
<th class='cell_checkbox'>x</th>
<th class='cell_name'>name</th>
<th class='cell_description'>content</th>

<?php
/************************************
 * This is the list of pages
 ***********************************/
$pages = $db->pages_array();

$output = "";

/************************************
 * print out each row of the table
 * of pages
 ***********************************/
foreach ($pages as $single) {
   $single['content'] = substr($single['content'],0,250).'...';
   
   //heredoc format for strings
   $output .= <<<EOT
   <tr class="oil-list">
      <td class = "cell_checkbox"> <input type='checkbox' name='id[]' value={$single['id']}> </td>
      <td class = "cell_name"> <a href='pages/edit.php?id={$single['id']}'>{$single['name']}</a> </td>
      <td class = "cell_content"> {$single['content']} </td>
   </tr>
EOT;
}

echo $output;


?>
</table>
</form>

<h2>Oils</h2>

<input type="button" onclick="submitForm('oils/add.php')" value="new oil" />
<input type="button" onclick="submitForm('oils/hide.php')" value="hide" />
<input type="button" onclick="submitForm('oils/show.php')" value="show" />
<input type="button" onclick="submitForm('oils/delete.php')" value="delete" />
<table id='oil-list'>
<th class='cell_checkbox'>x</th>
<th class='cell_visible'>visible</th>
<th class='cell_price'>price</th>
<th class='cell_name'>name</th>
<th class='cell_description'>description</th>

<?php
/************************************
 * This is the list of oils
 ***********************************/
$oils = $db->oils_array();

$output = "";

/************************************
 * print out each row of the table
 * of oils
 ***********************************/
foreach ($oils as $single) {
   $shown = "HIDDEN";
   if ($single['visible'] == true) {
      $shown = "public";
   }

   $single['description'] = substr($single['description'],0,250).'...';
   
   //heredoc format for strings
   $output .= <<<EOT
   <tr class="oil-list">
      <td class = "cell_checkbox"> <input type='checkbox' name='id' value={$single['id']}> </td>
      <td class = "cell_visible"> $shown </td>
      <td class = "cell_price"> \${$single['price']} </td>
      <td class = "cell_name"> <a href='oils/edit.php?id={$single['id']}'>{$single['name']}</a> </td>
      <td class = "cell_description"> {$single['description']} </td>
   </tr>
EOT;
}

echo $output;


?>
</table>
</form>

<?php
include_once('include/footer.php');
?>

