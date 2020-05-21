<?php
        require_once 'class/conn.php';
		session_start();
    $c = new databaser("databaser","localhost","root","");
    $select1 = $c ->todosdados();
    
    
?>

<!DOCTYPE html5>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CONSULTA RESULTADO | LOTERIA</title>
</head>
<body>

    
		  
      <form action="api.php" method="post">
        <select name="lista" id="lista" class="custom-select" >concurso
          <option selected disabled>Nº CONCURSO</option>
              <?php foreach ($select1 as $s){ ?>
          <option type="submit" value="<?php echo ($s['concurso'])?>"><?php echo ($s['concurso'])?></option> <?php
              } ?>
          <input name="" type="submit" value="BUSCAR CONCURSO">
        </select>
      </form>

       
  <form enctype="multipart/form-data" method="post" action="api.php">
    <div class="container">
      <div class="box">

      <div  class="form-group">
        <label for="exampleInputEmail1">1</label>
        <input class="exampleInputEmail1" type="text" placeholder="inpult 1">
      </div>

    <div  class="form-group">
      <label for="exampleInputEmail2">2</label>
      <input type="text" class="exampleInputEmail2" id="exampleInputEmail2" aria-describedby="emailHelp" name="2">
    </div>
    
    <div  class="form-group">
      <label for="exampleInputEmail3">3</label>
      <input type="text" class="exampleInputEmail3" id="exampleInputEmail3" aria-describedby="emailHelp" name="3">
    </div>
    
    <div  class="form-group">
      <label for="exampleInputEmail4">4</label>
      <input type="text" class="exampleInputEmail4" id="exampleInputEmail4" aria-describedby="emailHelp" name="4">
    </div>
    
  </div>
    <button type="button" class="btn btn-primary" onclick="clicar();">Cadastrar</button>
  </form>
</div>
</div>    

<script>
/*
function clicar3(){
$.ajax({
    url: "busca.php",
    type: "POST",
    data: "lista",
    dataType: "html"

}).done(function(resposta) {
  
    console.log(resposta);
    function logArrayElements(resposta, index, array) {
    console.log("a[" + index + "] = " + resposta);
}
[resposta].forEach(logArrayElements);

});


}).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

}).always(function() {
    console.log("completou");
});
}

*/
</script>

<?php
if (isset($_POST['lista'])){
$concurso = $_POST['lista'];
$select = $c->api($concurso);

foreach ($select as $v ) {  
}
}
?>  
                       
 <script>
   <?php if(isset($_POST['lista'])){ ?>                       
    var r1 = <?php echo ($v['a1']);?>;
    var r2 = <?php echo ($v['a2']);?>;
    var r3 = <?php echo ($v['a3']);?>;
    var r4 = <?php echo ($v['a4']);?>;
    <?php
  }  ?>            
  function clicar(){
    
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
