function GetRandomID(id) 
{
  var idne = id;
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  var panjang_id = 7;
  var randomId = '';
  for (var i=0; i<panjang_id; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomId += chars.substring(rnum,rnum+1);
  }
  var myElement = document.getElementById(idne);
  myElement.value = randomId;
}