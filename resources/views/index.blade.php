@extends('layout')
<html>
    @yield('head')
<body>
        <br /><br /><br /><br /><br />
    <div style="text-align:center;">
        <h1>Auditorias</h1><br /><br />        
        </div>
        <div name="mainDiv" id="mainDiv" style="text-align:center;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#showAudits" id="showaudi">Mostrar Auditorias</button><br /> 
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalForm" id="newaudit">Registrar Auditoria</button><br /> 
        <button class="btn btn-primary" data-toggle="modal" data-target="#RelUserAudits" id="relaudit" >Rel Auditoria/Usuario</button> <br /> 
        <button class="btn btn-primary" data-toggle="modal" data-target="#typeAudit" id="auditType" >Agregar tipo de Auditoria</button> <br />       
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
                    <!--<span class="sr-only">Cerrar</span>-->
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
                <!--<button type="button" class="btn btn-primary submitBtn"  id="submitForm">Enviar</button>-->
                <button type="button" class="btn btn-primary submitBtn"  id="submitForm">Enviar</button>
            </div>
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
                    <!--<span class="sr-only">Close</span>-->
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

<!-- Registrar tipo auditoria Inicio -->
<div class="modal fade" id="typeAudit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Pop up Header -->
            <div class="modal-header">                
                <h4 class="modal-title" id="newAudit">Nuevo Tipo de Auditoria</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <!--<span class="sr-only">Cerrar</span>-->
                </button>
            </div>            
            <!-- Form pop up -->
            <div class="modal-body">
                <!--@csrf-->
                <p class="statusMsg2"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Tipo de Auditoria</label>
                        <input type="text" class="form-control" id="inputTypeAudit" placeholder="Tipo de Auditoria"/>
                    </div>                    
                    <div class="form-group">
                        <label for="inputDesc">Descripción</label>
                        <textarea class="form-control" id="inputDescAudit" placeholder="Descripción..."></textarea>
                    </div>
                </form>
            </div>            
            <!-- Pop up botones -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="align:left;">Cancelar</button>
                <!--<button type="button" class="btn btn-primary submitBtn"  id="submitForm">Enviar</button>-->
                <button type="button" class="btn btn-primary submitBtn" id="submitFormType" >Enviar</button>
            </div>
            </div>
        </div>
    </div>
</div>   
<!-- Registrar tipo auditoria Fin -->

</body>
</html>