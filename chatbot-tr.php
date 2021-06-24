<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<style>
body{
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
  text-align:center;
  padding-top:10%;
  height:100%;
}
.container {
  border: 2px solid #dedede;
  background-image: linear-gradient(45deg, transparent, #c4d8a7 );
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}
.input{
	height:auto;
	padding-top:5%;
	padding-bottom: 5%;
}
#input{
  -webkit-transition: border, 100ms;
  transition: border, 100ms;
  font-size: 1em;
  font-family: 'Open Sans', helvetica, sans-serif;
  line-height: 1.5em;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  padding: .5em 1em;
  border: none;
  background: #e2e2e2;
  display: block;
  margin: .5em 0;
}

#input:focus {
  border-left: 0.5em solid tomato;
}
#input:focus {
  color: #333;
  background-color:#BFE3B4;
}
#input:focus {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none;
  background: url('assets/images/bg-stripes.png');
}

input[type="text"] {
  width: 100%;
}
input[type="button"] {
  -webkit-transition-property: background-color, color;
  display: block;
  margin: 0 auto;
  padding: 20px;
  width: 50%;
  border: none;
  border-radius: 0.3em;
  background-color: grey;
  color: white;
  font-size: 1em;
 
}
input[type="button"]:hover, input[type="button"]:active, input[type="button"]:focus {
  background-color:tomato;
  color: white;
}
.close {
  border-radius:10px;  
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: green;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: .6;
  background-color:tomato
}
.close:hover,
.close:focus {
  color:green;
  text-decoration: none;
  cursor: pointer;
  filter: alpha(opacity=50);
  opacity: .9;
}


</style>
 </head>
 <body>
 <div class="container">
 <div class="row"> <h1 style="color:#fba70b"> Merhaba Yapay Zekalı Diyetisyenimize Herşeyi Sorabilirsiniz</h1></div>
 <a href="index.php"><button type="button" data-ng-click="iptal()" class="close custom-modal-close-button" aria-hidden="true" style="">&times;</button></a>
 <!--<a onclick="CloseForm()"><button type="button" id="gonder" style="margin-left:300px;  " >X </button></a> -->
 <div class="input">
<input type="text" id="input" name="giris">
<input type="button" name="gonder" id="gonder" value="Gönder" />
</div>

<script language="javascript">
//window.alert("Lütfen Chatbot a birşey yazarken türkçe karakter girmeyiniz.");
</script> 
 
 
<script type="text/javascript">

function Cevir(text)
 {
    var trMap = {
        'çÇ':'c',
        'ğĞ':'g',
        'şŞ':'s',
        'üÜ':'u',
        'ıİ':'i',
        'öÖ':'o'
    };
    for(var key in trMap) {
        text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
    }
    return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '');
                

}


	$(document).ready(function(){
 
		$("#gonder").click(function(){
		var kullanici_degeri_tr = $('#input').val();

    kullanici_degeri=Cevir(kullanici_degeri_tr);
		console.log(kullanici_degeri);
    
		$.post("chatbot-sonuc-tr.php",{kullanici_gonder:kullanici_degeri},function(gonderVeri){
                               $('#sonuc').html(gonderVeri);
 
                 });
			});
});

 
</script>
<div id='sonuc'></div>
</div>


</body>
</html>