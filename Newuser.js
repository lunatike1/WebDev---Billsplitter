var count = 1;
$(document).ready(function(){

  $('#newuser').click(function(){
    $('#emails').append('<div class="email"> <input type="email" id="email'+count+'" name="email'+count+'" placeholder="Friend&#39;s email"> <br> </div>');
    count = count + 1;
    $('#emailnumber').val(count);
    return false;
  });

  $('#Deleteuser').click(function(){
    $('.emails').last().remove();
    count = count - 1;
    $('#emailnumber').val(count);
    return false;
  });
});

function pay(billid, userid){
  var data = {'billid':billid, 'userid':userid};
  $.post('PayBillPHP.php', data, function(data){
    console.log('success');
  });
  $('#pay'+billid).html = "Paid.";
  return false;
}
