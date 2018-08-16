function checkname()
{
 var name=document.getElementById( "UserName" ).value;
 if(name) {
  $.ajax({
  type: 'post',
  url: 'frontend/data/cekdata',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="Username tersedia")
   {
      return true;
   }
   else
   {
    return false;
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}

function checkemail()
{
 var email=document.getElementById( "UserEmail" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'frontend/data/cekdata',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="Email tersedia")
   {
    return true;
   }
   else
   {
    return false;
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function checkall()
{
 var namehtml=document.getElementById("name_status").innerHTML;
 var emailhtml=document.getElementById("email_status").innerHTML;

 if(namehtml=="Username tersedia" && emailhtml=="Email tersedia")
 {
  return true;
 }
 else
 {
  return false;
 }
}
