var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}

$(document).ready(function() {

 $(".del-item").click(function() {
   var item_id = $(this).parent().parent().attr('id');

   $.post("_deletebill.php",{"id":item_id},function(data) {
     console.log("success");
   });
   $(this).parent().parent().remove();
 });

 $("#addItemForm").submit(function(){
   var itemName = $('#item').val();
   var listID = $('#id').val();
   var data = {'item':itemName, 'listid':listID};
   $.post('_addbill.php', data, function(data){
     var html = "<tr><td>" + escapeHtml(itemName) + "</td><td>" + "<button type='button' class='del-item'>Complete</button> </td></tr>";
     $('#listsTable').append(html);
   });
   return false;
 })
});
