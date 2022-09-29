$('#Circuito').on('change', function() {
    
    var circuito = $("#Circuito").val(); 
    var rama = $("#Rama").val(); 
    var url1 = "FiltroCircuitos";

    $.get(url1, {circuito:circuito, rama:rama }, function(array){

        var html ='';
        array.forEach(function(nodo, index) {

          html +='<div class="col-md-3 order-1" style="margin-bottom: 20px">'+
                '<img class="center rounded mx-auto d-block" alt="Imagen" src="./instituciones/'+Object.values(nodo)[0]+'/'+Object.values(nodo)[2]+'" width="200" height="200" >'+
                '<br>'+
                '<a href="./detalleInstitucion/'+Object.values(nodo)[0]+'"><p class="nombreColegiosListados" style="text-align:center;">'+Object.values(nodo)[1]+'</p></a>'+
                '</div>';
        });
        
			  $("#DivDinamicoAJAX").html(html);

    }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR,textStatus,errorThrown);
    });
  
  });

  $('#Rama').on('change', function() {             
    var circuito = $("#Circuito").val(); 
    var rama = $("#Rama").val(); 
    var url2 = "FiltroCircuitos";

    $.get(url2, {circuito:circuito, rama:rama }, function(array2){

        var html2 ='';
        array2.forEach(function(nodo2, index) {

          html2 +='<div class="col-md-3 order-1" style="margin-bottom: 20px">'+
                '<img class="center rounded mx-auto d-block" alt="Imagen" src="./instituciones/'+Object.values(nodo2)[0]+'/'+Object.values(nodo2)[2]+'" width="200" height="200" >'+
                '<br>'+
                '<a href="./detalleInstitucion/'+Object.values(nodo2)[0]+'"><p class="nombreColegiosListados" style="text-align:center;">'+Object.values(nodo2)[1]+'</p></a>'+
                '</div>';
        });
        
			  $("#DivDinamicoAJAX").html(html2);

    }).fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR,textStatus,errorThrown);
    });
  
  });