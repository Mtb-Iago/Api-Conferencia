<?php
        require_once 'class/conn.php';
		session_start();
		$c = new databaser("databaser","localhost","root","");
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form enctype="multipart/form-data" method="post" action="">
		  
    <div class="form-group">
      <label for="exampleInputEmail1">Concurso</label>
      <input type="text" class="concurso" id="exampleInputEmail1" aria-describedby="emailHelp" name="concurso" required>
    </div>
</div>

  </div>     

  <div class="container">
      <div class="box">

        <div class="separa">
        <label for="exampleInputEmail1">1</label>
            <input class="exampleInputEmail1" type="text" placeholder="inpult 1">

    <div style="width: 50px; margin-right: 10px;" class="form-group">
      <label for="exampleInputEmail2">2</label>
      <input type="text" class="exampleInputEmail2" id="exampleInputEmail2" aria-describedby="emailHelp" name="2" required>
    </div>
    
    <div style="width: 50px; margin-right: 10px;" class="form-group">
      <label for="exampleInputEmail3">3</label>
      <input type="text" class="exampleInputEmail3" id="exampleInputEmail3" aria-describedby="emailHelp" name="3" required>
    </div>
    
    <div style="width: 50px;margin-right: 10px;" class="form-group">
      <label for="exampleInputEmail4">4</label>
      <input type="text" class="exampleInputEmail4" id="exampleInputEmail4" aria-describedby="emailHelp" name="4" required>
    </div>
    
  </div>
    <button style="margin-top:-30px;" type="button" class="btn btn-primary" onclick="clicar()">Cadastrar</button>
  </form>
</div>
</div>    


<?php
$concurso = 9876;
$select = $c->api($concurso);

foreach ($select as $v ) {
  
}
?>
    
   
                       
                        <script>
                          
    var r1 = <?php echo ($v['a1']);?>;
    var r2 = <?php echo ($v['a2']);?>;
    var r3 = <?php echo ($v['a3']);?>;
    var r4 = <?php echo ($v['a4']);?>;
                  
function clicar(){
    concurso = document.querySelector(".concurso").value;
    alert(concurso);

 var n1 =  document.querySelector(".exampleInputEmail1").value; 
alert(n1)
 var n2 = document.querySelector(".exampleInputEmail2").value;
 alert(n2)

  n3 = document.querySelector(".exampleInputEmail3").value;
alert(n3)

    n4 = document.querySelector(".exampleInputEmail4").value;
    alert(n4)
   
 
var jogo = [];
jogo.push(parseInt(n1),parseInt(n2),parseInt(n3),parseInt(n4));
console.log(jogo);


        var sorteio = [r1,r2,r3,r4];       
        var acertos = [];
                    
        sorteio.filter(function(element) {
          if (jogo.includes(element)) {   // se for encontrado um valor nos dois arrays
            acertos.push(element)
          }
        });        
        alert('Os números que você acertou foram: '+ acertos)
        console.log(acertos);
        
        var i = 0;
while (i < acertos.length) { //vai até o tamanho já conhecido
   
   i++; //incrementa a variável para o próximo passo

}
alert("vc acertou "+i +" numero(s)"); //pega o elemento indexado pela variável de controle do laço


}
                        </script>     




   
        
</body>
</html>
