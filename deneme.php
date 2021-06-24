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
    return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') 
                .toLowerCase();

}


		//var kullanici_degeri = $('#input').val();

    kullanici_degeri=Cevir("Şevval Öztürk");
		console.log(kullanici_degeri);
    

 
</script>