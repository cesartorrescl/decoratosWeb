<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Ventas</title>
        <link href="{{ asset('css/estiloform.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/estilotabla.css') }}"  type="text/css" rel="stylesheet">
        <script type="text/javascript">
	        function deleteRow(tableID)  {
	        var table = document.getElementById(tableID).tBodies[0];
          var total = parseInt(document.getElementById('total').value);
          var resta= 0;
	        var rowCount = table.rows.length;
          // var i=1 to start after header
	        for(var i=0; i<rowCount; i++) {
	            var row = table.rows[i];
	            // index of td contain checkbox is 8
	            var chkbox = row.cells[5].getElementsByTagName('input')[0];
	            if('checkbox' === chkbox.type && true === chkbox.checked) {
                  resta=((parseInt(resta))+(parseInt(document.getElementById('subtotal1').value)));
	                table.deleteRow(i);
                  rowCount--;
                  i--;
	             }
	        	}
            //$("#total").val(parseInt(total)-parseInt(resta));
            if(rowCount==0){
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              var cell6 = row.insertCell(5);
              cell1.innerHTML = '<input type="text" name="codigo'+rowCount+'" id="codigo1" class="intable" value=""  readonly>';
              cell2.innerHTML = '<input type="text" name="nombre'+rowCount+'" id="nombre1" class="intable" value=""  readonly>';
              cell3.innerHTML = '<input type="text" name="cantidad'+rowCount+'" id="cantidad1" class="intable" value=""  readonly>';
              cell4.innerHTML = '<input type="text" name="precio'+rowCount+'" id="precio1" class="intable" value=""  readonly>';
              cell5.innerHTML = '<input type="text" name="subtotal'+rowCount+'" id="subtotal1" class="intable" value=""  readonly>';
              cell6.innerHTML = '<section title=".squaredTwo"> <div class="squaredTwo"> <input type="checkbox" value="None" id="squaredTwo" name="check'+rowCount+'" checked /><label for="squaredTwo"> </label> </div> </section>';
              $("#total").val(0);
            }
            else{
               var suma = 0;
               for (var i=1;i < document.getElementById('tabla').rows.length; i++){
                       //for (var j=0; j<3; j++){
                              //textos = textos + document.getElementById('Tabla').rows[i].cells[j].innerHTML + " -> ";
                              //if(i!=0){
                                var aux = parseInt(document.getElementById('tabla').rows[i].cells[4].childNodes[0].value);
                                suma = suma + aux;
                                //alert(aux);
                          //    }
                       //}
               } 
               //alert(textos);
              //alert(suma);
              $("#total").val(suma);
            }
			     }
		</script>
        </head>
<body>
 <div id="inventario">
    <div class="fondo">
     <img src="Logo.png" height="62" width="62" style="position: absolute; top: 0; left: 0; text-transform: uppercase; text-decoration: none" />
     </div>
     <div style="position:absolute; top:7px; right: 7px;">
         <form method="get" action="inventario">
             <button class="linkboton" type="submit">Inventario</button>
         </form>
      </div>
    <div id="decoratos-form">
        <div>
            <h1>Sistema de Ventas</h1> 
            <h4>Venta de productos</h4> 
        </div>
            <p id="failure">Error</p>  
            <p id="success">Exito</p>

               
                <div>
                  <label for="name">
                    <span class="required">Usuario</span> 
                    <input type="text" id="name" name="name" value="usuario1" placeholder="usuario1" required="required" tabindex="1" autofocus="autofocus" disabled />
                  </label> 
                </div>
                <div>		          
                  <label for="subject">
                  <span>Seleccione Producto: </span>
                     <select id="producto" name="producto" tabindex="4">   
                         @foreach($productos as $producto)
							<option value={{$producto->codigo."-".$producto->nombre."-".$producto->precio_venta}}>{{$producto->nombre}}-{{$producto->codigo}}
							</option>
  						@endforeach
                    </select>
                  </label>
                </div>
                <div>
                    <label for="cantidad">
                    <span class="required">Cantidad</span> 
                    <input required="required" type="number" min="1" id="cantidad" name="cantidad" value="1" placeholder="ingrese cantidad de productos"  tabindex="1" autofocus="autofocus" />
                  </label> 
                </div>
                <div>	
		    		<input type="button" name="ad-boton1" id="ad-boton1" value="AGREGAR">	           
                </div>
            
        </div>
        {!! Form::open([ 'route' => 'ventas.store', 'method' => 'POST']) !!}
    <div class="datagrid">
        <table id="tabla">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                    <th><input type="checkbox" onclick="marcar(this);"/></th>
                </tr>
            </thead>
            <tbody>
		
                <tr>
                    <td ><input type="text" name="codigo1" id="codigo1" class="intable" value=""  readonly> </td>
                    <td ><input type="text" name="nombre1" id="nombre1" class="intable" value=""  readonly></td>
                    <td ><input type="text" name="cantidad1" id="cantidad1" class="intable" value=""  readonly></td>
                    <td ><input type="text" name="precio1" id="precio1" class="intable" value=""  readonly></td>
                    <td ><input type="text" name="subtotal1" id="subtotal1" class="intable" value=""  readonly></td>
                    <td>
                    <section title=".squaredTwo">
                            <div class="squaredTwo">
                              <input type="checkbox" value="None" id="squaredTwo" name="check" checked />
                              <label for="squaredTwo"></label>
                            </div>
                     </section>
                    </td>
                </tr>
            </tbody>
            <!--<tfoot>
                <tr>
                    <td colspan="5">
                        <div id="paging">
                            <ul>
                                
                                <li>
                                    <a onclick="deleteRow('tabla')">
                                        <span>eliminar</span>
                                    </a>
                                </li>
                               <li>
                                   <a href="#">
                                       <span>confirmar</span>
                                   </a>
                                </li
                                <li>
                                    <label for="total">
                                    <a href="#" class="required">Total</a> 
                                    <input type="text" id="total" name="total" value="0" required="required" tabindex="1" autofocus="autofocus" disabled />
                                    </label> 
                                </li>
                            </ul>
                        </div>
                    </td>W
                </tr>
            </tfoot>-->
        </table>
    	</div>
      <div class="box-total">
          <a onclick="deleteRow('tabla')"><span>eliminar</span></a>
          {!! Form::submit('Confirmar') !!}
          <label for="total">
            <a>Total:</a> 
            <input type="text" id="total" name="total" value="0" required="required" tabindex="1" autofocus="autofocus" disabled="">
          </label>
        </div>
    </div>
  {!! Form::close() !!}
    <script src="{{ asset('js/checkbox.js') }}"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function()
	{
	$("#ad-boton1").click(function () {
		var value = document.getElementById("producto").value;
		var nombrecod = value.split("-");
		var valorunit = nombrecod[2];
		var cant = document.getElementById("cantidad").value;
		var subtotal=valorunit*cant;
		var total = document.getElementById("total").value;
		if(total!=0){
	         	var table = document.getElementById("tabla").tBodies[0];
            var rowCount = table.rows.length;
            var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              var cell5 = row.insertCell(4);
              var cell6 = row.insertCell(5);
              cell1.innerHTML = '<input type="text" name="codigo'+rowCount+'" id="codigo1" class="intable" value=""  readonly>';
              cell2.innerHTML = '<input type="text" name="nombre'+rowCount+'" id="nombre1" class="intable" value=""  readonly>';
              cell3.innerHTML = '<input type="text" name="cantidad'+rowCount+'" id="cantidad1" class="intable" value=""  readonly>';
              cell4.innerHTML = '<input type="text" name="precio'+rowCount+'" id="precio1" class="intable" value=""  readonly>';
              cell5.innerHTML = '<input type="text" name="subtotal'+rowCount+'" id="subtotal1" class="intable" value=""  readonly>';
              cell6.innerHTML = '<section title=".squaredTwo"> <div class="squaredTwo"> <input type="checkbox" value="None" id="squaredTwo" name="check'+rowCount+'" checked /><label for="squaredTwo"> </label> </div> </section>';
              //$("#total").val(0);
            /*
            var clone =$("#tabla tbody tr:eq(0)").clone();
	    clone.find("#codigo1").attr("name","codigo"+rowCount);
	    clone.find("#nombre1").attr("name","nombre"+rowCount);
	    clone.find("#cantidad1").attr("name","cantidad"+rowCount);
      clone.find("#precio1").attr("name","precio"+rowCount);
      clone.find("#subtotal1").attr("name","subtotal"+rowCount);
      clone.find("#squaredTwo").attr("name","check"+rowCount);
	    clone.appendTo("#tabla");*/
		}
		$("#codigo1").val(nombrecod[0]);
		$("#cantidad1").val($("#cantidad").val());
		$("#precio1").val(nombrecod[2]);
		$("#nombre1").val(nombrecod[1]);
		$("#subtotal1").val(subtotal);
		$("#total").val(parseInt(subtotal)+parseInt(total));
	});			
});	


</script>
    </body>
</html>