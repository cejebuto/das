<?php 
$w = array(
    "foo" => "bar",
    "bar" => "foo",
);
#LISTO TODOS LOS CAMPOS
include_once ($_SERVER['DOCUMENT_ROOT']."/module/mod_field/sql/sql_list_field.php");
$array_php = array();

echo "<select style='display:none'id='select1' >"; 
while ($row_list_field=mysqli_fetch_array($sql_list_field)) {   
echo "<option value='".$row_list_field['fie_id']."'> ".$row_list_field['fie_nam']."</option>";
} mysqli_free_result($sql_list_field);
echo "</select>";

# while ($row_list_field=mysqli_fetch_array($sql_list_field)) {   
#    $array_php[$row_list_field['fie_id']] = $row_list_field['fie_nam'];
#} mysqli_free_result($sql_list_field);
#print_r ($array_php);
 ?>
<html>
<HEAD>
     <TITLE>Crear un formulario</TITLE>

     <SCRIPT language="javascript">
     var j=0;
     var c=0;
          function addRow(tableID) {
               j=j+1;
               c=c+1;

               document.frmcreate.contador.value=c;

               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount); 

               var cell1 = row.insertCell(0);
               var element1 = document.createElement("input");
               element1.type = "checkbox";
               cell1.appendChild(element1);

               var cell2 = row.insertCell(1);
               var element2 = document.createElement("input");
               element2.id="label_usuario"+j;
               element2.name="label_usuario"+j;
               element2.type = "text";
               cell2.appendChild(element2);

               var cell3 = row.insertCell(2);
               var element3 = document.createElement("input");
               element3.id="label_sistema"+j;
               element3.name="label_sistema"+j;
               element3.type = "text";
               cell3.appendChild(element3);

               var cell4 = row.insertCell(3);
               var original=document.getElementById("select1");
               var element4=original.cloneNode(true);
               element4.id="label_tipo"+j;
               element4.name="label_tipo"+j;
               element4.style.display = "block";
               cell4.appendChild(element4);

               var cell5 = row.insertCell(4);
               var element5 = document.createElement("input");
               element5.type = "checkbox";
               element5.checked =true;
               element5.name="chk_required"+j;
               cell5.appendChild(element5);
          }
          function deleteRow(tableID) {
               try {
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                         table.deleteRow(i);
                         rowCount--;
                         i--;
                         c--;
                        document.frmcreate.contador.value=document.getElementById('contador').value - 1; 
                    }
               }
               }catch(e) {
                    alert(e);
               }
          }
     </SCRIPT>

</HEAD>
<BODY>
     
<span class="label label-success" style="font-size:25px">Crear un </span><span class="label label-primary" style="font-size:25px">Formulario !</span><br><br>

<div id="MyWizard" class="wizard">
     <ul class="steps">
          <li data-target="#step1" class="active"><span class="badge badge-info">1</span><span class="chevron"></span>Paso 1</li>
          <li data-target="#step2"><span class="badge">2</span><span class="chevron"></span>Paso 2</li>
          <li data-target="#step3"><span class="badge">3</span><span class="chevron"></span>Listo</li>
     </ul>
</div>
  
     <form action="/module/mod_generateform/process/pro_generateform.php" name="frmcreate" method="post">
<div class="col-lg-4">
     <div class="form-group">
     <label for="TITLE_USER">TITULO PARA LA CODUMENTACION (NOTICIAS, CLIENTES):</label>
    <input type="text" class="form-control" id="TITLE_USER" name="TITLE_USER" size="20" value ="sds"required>
      </div>

     <div class="form-group">
     <label for="TITLE_SISTEM">TITULO para el sistema(news, client):</label>
    <input type="text" class="form-control" id="TITLE_SISTEM" name="TITLE_SISTEM" size="20" value ="sdsdd" required>
       </div>

      <div class="form-group">
      <label for="VALUE_SISTEM">VALUE PARA EL ADD(I,A,AC,AD):</label>
     <input type="text" class="form-control" id="VALUE_SISTEM" name="VALUE_SISTEM" size="20" value ="sdsdsd" placeholder="I"required>
     </div>
</div>
<br>

     <INPUT type="button" class="btn btn-success" value="A&ntilde;adir Campo" onclick="addRow('dataTable');" />
     <INPUT type="button" class="btn btn-danger" value="Borrar Campo" onclick="deleteRow('dataTable');" /><br><br>
     <TABLE id="dataTable" width="350px" border="1">
            <TR>
               <TD> CHK </TD>
               <TD> Nombre Label </TD>
               <TD> Nombre Sistema </TD>
               <TD> Tipo de Valor </TD>
               <TD> Requerido </TD>
          </TR>
     </TABLE><br>
<TD><INPUT type="hidden" id="contador" NAME="contador" value=0 /></TD>
 <p><input type="submit" id="btn_sumbit" class="btn btn-primary" value="Enviar" /></p>
 <br>
 <br>
 <br>
</form>
</BODY>
</html>
