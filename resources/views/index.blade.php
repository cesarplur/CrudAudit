@extends('layout')
<html>
    @yield('head')
<body>
        <br /><br /><br /><br /><br />
    <div style="text-align:center;">
        <h1>Auditorias</h1><br><br>        
        </div>
        <div name="mainDiv" id="mainDiv" style="text-align:center;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#showAudits" id="showaudi">Mostrar Auditorias</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalForm" id="newaudit">Nueva Auditoria</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#RelUserAudits" id="relaudit" >Rel Auditoria/Usuario</button>        
    </div>
    <!-- Pop up nueva auditoria Inicio -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Pop up Header -->
            <div class="modal-header">                
                <h4 class="modal-title" id="myModalLabel">Nueva Auditoria</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Form pop up -->
            <div class="modal-body">
                <!--@csrf-->
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Usuario</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Usuario"/>
                    </div>
                    <div class="form-group">
                        <label for="inputTipo">Tipo</label>
                        <!--<input type="text" class="form-control" id="inputTipo" placeholder="Tipo de Auditoria"/>-->
                    <select class="form-control" id="inputTipo">
                    <option value=""></option>
                        @foreach($data2 as $item)                          
                        <option value="{{$item->Name}}">{{$item->Name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDesc">Descripción</label>
                        <textarea class="form-control" id="inputDesc" placeholder="Descripción..."></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Pop up botones -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="align:left;">Cancelar</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()" id="submitForm">Enviar</button>
            </div>
        </div>
    </div>
</div>   
<!-- Pop up nueva auditoria Fin -->

<!--Pop up tabla Auditorias Inicio-->
<div class="modal fade" id="showAudits" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title" id="myModalLabel">Auditorias</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  <!--  <span class="sr-only">Close</span>-->
                </button>
            </div>
            
    <table id="tables" class="table table-striped table-bordered nowrap" style="width:90%;margin-left: auto;margin-right: auto;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Auditoria</th>                
                <th>Descripción</th>                
            </tr>
        </thead>        
        <tbody>                
                
                <tr>                
                </tr>    
                          
        </tbody>
    </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            </div>
        </div>
    </div>
</div>       
<!--Pop up tabla Auditorias Fin-->

<!-- Pop up RelUserAudits Inicio -->
<div class="modal fade" id="RelUserAudits" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Pop up Header -->
            <div class="modal-header">                
                <h4 class="modal-title" id="myModalLabel">Relacion</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Form pop up -->
            <div class="modal-body">
                <!--@csrf-->
                <form role="form">                    
                    <div class="form-group">
                        <label for="inputType">Tipo</label>
                        <!--<input type="text" class="form-control" id="inputTipo" placeholder="Tipo de Auditoria"/>-->
                    <select class="form-control" id="inputType" name="inputType" onchange="showTable()">
                    <option value="empty"></option>
                        @foreach($data2 as $item)                          
                        <option value="{{ $item->Id }}">{{ $item->Name }}</option>
                        @endforeach
                    </select>
                    </div>
                    
                </form>
            </div>
    <div id="displayNone" name="displayNone"  style="display: none">
        <table id="table2" class="table table-striped table-bordered nowrap" style="width:90%;margin-left: auto;margin-right: auto;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Auditoria</th>                
                    <th>Descripción</th>                
                </tr>
            </thead>        
            <tbody>               
                <tr>                
                </tr>                          
            </tbody>
    </table>
    </div>
            <!-- Pop up botones -->
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal" style="align:left;">Cancelar</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="" id="submitForm">Editar</button>
            </div>
        </div>
    </div>
</div>   
<!-- Pop up RelUserAudits Fin -->

<!--Enviar Form-->
<script>
function submitContactForm(){   
    //document.getElementById("submitForm").onclick = function() {
    var user = $('#inputName').val();
    var tipo = $('#inputTipo').val();
    var desc = $('#inputDesc').val();
    var token = '{{ csrf_token() }}';
    var msg = '';
    
    if(user.trim() == '' ){
        alert('Ingresa el usuario.');
        $('#inputName').focus();
        return false;
    }else if(tipo.trim() == '' ){
        alert('Ingresa el tipo de Auditoria.');
        $('#inputTipo').focus();
        return false;
    }else if(desc.trim() == '' ){
        alert('Ingresa la descripción.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({            
            type:'post',
            url:'{{ route('Audits.store') }}',
            data:'contactFrmSubmit=1&name='+user+'&tipo='+tipo+'&desc='+desc,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(response){ 
                var responseVal = response.success.toString();                          
                if(responseVal == 'true'){                    
                    $('#inputName').val('');
                    $('#inputTipo').val('');
                    $('#inputDesc').val('');
                    $('.statusMsg').html('<span style="color:green;">Auditoria Registrada</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Ocurrio un problema, por favor intentalo de nuevo</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>
<!--Fin Envia Form-->

<!--Mostrar table inicio-->
<script type="text/javascript">
    //$(document).ready(function () {
    document.getElementById("showaudi").onclick = function() { 
        var table = '';
       table =  $('#tables').DataTable({
            retrieve: true,
            processing: true,
            serverSide: false,
            searching: true,
            pageLength: 10,                       
            ajax: '{{ route('Audits.show') }}',
            columns: [
                { data: 'id', name: 'id', visible: true },
                { data: 'User', name: 'User', visible: true },
                { data: 'Name', name: 'Name', visible: true }, 
                { data: 'Description', name: 'Description', visible: true },               
            ],    
            
        });
        //$("#tables").dataTable().fnDestroy(); 
    };
    </script>
<!--Mostrar table final-->

<script type="text/javascript"> 
        //$('#inputType').change(function() {
        //$(".inputType").on('change', function () {
    function showTable(){
        table =  $('#table2').DataTable({
                    retrieve: true,
                    processing: true,
                    serverSide: false,
                    searching: false,
                    pageLength: 5,
                    lengthChange: false,
                    info: false,                       
                    ajax: '{{ route('Audits.show') }}',
                    columns: [
                        { data: 'id', name: 'id', visible: true },
                        { data: 'User', name: 'User', visible: true },
                        { data: 'Name', name: 'Name', visible: true }, 
                        { data: 'Description', name: 'Description', visible: true },               
                    ],                
                });             
                
        var value = $("#inputType option:selected").val();                                 
        //alert(value);
       
            if (value == 'empty'){ 
                $("#displayNone").hide();
            }else{
                var selection = $("#inputType option:selected").val();
                //var dataset = $("#table2").find("tr");
                alert(selection);
                table
                    .search( selection )
                    .draw();
        
                $("#displayNone").show();
            }
    };

   
</script>

</body>
</html>