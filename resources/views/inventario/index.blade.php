<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Inventario</title>
        <link href="{{ asset('css/estiloform.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/estilotabla.css') }}" type="text/css" rel="stylesheet">
        <script type="text/javascript">
          function deleteRow(tableID)  {
          var table = document.getElementById(tableID).tBodies[0];
          var rowCount = table.rows.length;

          // var i=1 to start after header
          for(var i=0; i<rowCount; i++) {
              var row = table.rows[i];
              // index of td contain checkbox is 8
              var chkbox = row.cells[3].getElementsByTagName('input')[0];
              if('checkbox' === chkbox.type && true === chkbox.checked) {
                  table.deleteRow(i);
                  rowCount--;
                  i--;
               }
            }
            if(i==0){
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              cell1.innerHTML = '<input type="text" name="codigo1" id="codigo1" class="intable" value="0"  readonly>';
              cell2.innerHTML = '<input type="text" name="nombre1" id="nombre1" class="intable" value=""  readonly>';
              cell3.innerHTML = '<input type="text" name="cantidad1" id="cantidad1" class="intable" value=""  readonly>';
              cell4.innerHTML = '<section title=".squaredTwo"> <div class="squaredTwo"> <input type="checkbox" value="None" id="squaredTwo" name="check" checked /><label for="squaredTwo"> </label> </div> </section>';   
              }
      }
    </script>
    </head>
<body>
 <div id="inventario">
    <div class="fondo">
     <img src="Logo.png" height="62" width="62" style="position: absolute; top: 0; left: 0;" />
    </div>
     <div>
         <form method="get" action="ventas" style="position:absolute; top:7px; right: 7px;">
             <button class="linkboton" type="submit" style=""position:absolute; top:7px; right: 7px;"">Ventas</button>
         </form>
      </div>
    <div id="decoratos-form">
        <div>
            <h1>Sistema de inventario</h1> 
            <h4>Ingreso de productos</h4> 
        </div>
            <p id="failure">Error</p>  
            <p id="success">Producto Insertado con exito</p>

               
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
                          <option value={{$producto->codigo."-".$producto->nombre}}>{{$producto->nombre}}-{{$producto->codigo}}
                          </option>
                        @endforeach
                      </select>
                  </label>
                </div>
                <div>
                    <label for="cantidad">
                    <span class="required">Cantidad</span> 
                    <input required="required" type="number" min="1" id="cantidad" name="cantidad" value="1" placeholder="ingrese cantidad de productos"  tabindex="1" autofocus="autofocus"/>
                  </label> 
                </div>
                <div>		           
                    <input type="button" name="ad-boton" id="ad-boton" value="AGREGAR"> 
                </div>
            
        </div>
{!! Form::open([ 'route' => 'inventario.store', 'method' => 'POST']) !!}
    <div class="datagrid">
        <table id="tabla">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th><input type="checkbox" onclick="marcar(this);"/></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><input type="text" name="codigo1" id="codigo1" class="intable" value="0"  readonly> </td>
                    <td ><input type="text" name="nombre1" id="nombre1" class="intable" value=""  readonly></td>
                    <td ><input type="text" name="cantidad1" id="cantidad1" class="intable" value=""  readonly></td>
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
                    <td colspan="4">
                        <div id="paging">
                            <ul>
                                <li>
                                    <a onclick="deleteRow('tabla')">
                                        <span>eliminar</span>
                                    </a>
                                </li>
                               <li>
                                   {!! Form::submit('Confirmar') !!}
                                </li>
                            </ul>
                        </div>
                </tr>
            </tfoot>-->
        </table>
    </div>
    <div class="box-total">
          <a onclick="deleteRow('tabla')"><span>eliminar</span></a>
          {!! Form::submit('Confirmar') !!}
        </div>
    </div>
{!! Form::close() !!}
    </div>
    <script src="{{ asset('js/checkbox.js') }}"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function()
        {
        $("#ad-boton").click(function () {
          var aux = document.getElementById("codigo1").value;
          if(aux != 0){
          	/*$("#tabla tbody tr:eq(0)").clone().appendTo("#tabla");
	   		var table = document.getElementById("tabla").tBodies[0];
            var rowCount = table.rows.length+1;
            var clone =$("#tabla tbody tr:eq(0)").clone();
		    clone.find("#codigo1").attr("name","codigo"+rowCount);
		    clone.find("#nombre1").attr("name","nombre"+rowCount);
		    clone.find("#cantidad1").attr("name","cantidad"+rowCount);
		    clone.find("#squaredTwo").attr("name","check"+rowCount);
		    clone.appendTo("#tabla");*/
		      var table = document.getElementById("tabla").tBodies[0];
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);
              cell1.innerHTML = '<input type="text" name="codigo1" id="codigo1" class="intable" value="0"  readonly>';
              cell2.innerHTML = '<input type="text" name="nombre1" id="nombre1" class="intable" value=""  readonly>';
              cell3.innerHTML = '<input type="text" name="cantidad1" id="cantidad1" class="intable" value=""  readonly>';
              cell4.innerHTML = '<section title=".squaredTwo"> <div class="squaredTwo"> <input type="checkbox" value="None" id="squaredTwo" name="check" checked /><label for="squaredTwo"> </label> </div> </section>'; 
          }
          var value = document.getElementById("producto").value;
          var nombrecod = value.split("-");
          var cant = document.getElementById("cantidad").value;
          $("#codigo1").val(nombrecod[0]);
          $("#cantidad1").val($("#cantidad").val());
          $("#nombre1").val(nombrecod[1]);
          
        });     
      }); 
    </script>
    </body>
</html>