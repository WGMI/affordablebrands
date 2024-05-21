function ajaxCall(a){
  console.log(a);
  var successMsg = document.getElementById('addedmsg'+a);
  successMsg.innerHTML = "Added";

  var countSpan = document.getElementsByClassName('countbadge');

  if(countSpan == null){
    console.log('null countSpan');
  } else{
    countSpan[0].innerHTML = (countSpan[0].innerHTML.length == 0) ? 1 : parseInt(countSpan[0].innerHTML) + 1;
  }

  setTimeout(function(){
    document.getElementById("addedmsg"+a).innerHTML="";
  },3000);

  var url = document.getElementById('postroute').value;
  console.log(url);
  var formdata = $('#prd'+a).serializeArray();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: url,
    type: 'post',
    dataType: 'json',
    data: formdata,
    success: function(){
      console.log('Success');
    },
    error: function(xhr, status, error){
      var errorMessage = xhr.status + ': ' + xhr.statusText
      console.log('Error - ' + errorMessage);
    }
  });
}

function ajaxProdCall(a){
  console.log(a);
  var form = document.getElementById('prd'+a);
  form.submit();
}

function ajaxQuickProdCall(a){
  console.log(a);
  var form = document.getElementById('prd'+a);
  var quick = document.createElement('input');
  quick.setAttribute('type','hidden');
  quick.setAttribute('value','1');
  quick.setAttribute('name','quick');
  form.appendChild(quick);
  form.submit();
}