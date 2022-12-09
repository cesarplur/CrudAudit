document.getElementById('submitForm').addEventListener('click', () => {
    var user = $('#inputName').val();
    var type1 = $('#inputTipo2').val();
    var desc = $('#inputDesc').val();
    var token = '{{ csrf_token() }}';
    var msg = '';
    alert(type1)
    if(user.trim() == '' ){
        alert('Ingresa el usuario.');
        $('#inputName').focus();
        return false;
    }else if(type1.trim() == '' ){
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
            url:'/store',
            data:'contactFrmSubmit=1&name='+user+'&tipo='+type1+'&desc='+desc,
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
});

var row = ""

$('#tables').on('click', 'tbody tr', function () {
    var table = $('#tables').DataTable();    
    row = table.row($(this)).data();    
    //console.log(row);   //array completo
    console.log(row.id);   //Id
    $("#updateBtn1").show();
});

document.getElementById('closeBtn1').addEventListener('click', () => {
    $("#updateBtn1").hide();   
});

document.getElementById('updateBtn1').addEventListener('click', () => { 
    $("#modalForm").hide();
    $("#updateAudit").show();
    $("#inputName1").val(row.User);
    $("#inputTipo1").val(row.Name);
    $("#inputDesc1").val(row.Description+'');
});
document.getElementById('closeModal1').addEventListener('click', () => {
    $("#updateAudit").hide();
});
document.getElementById('close1').addEventListener('click', () => {
    $("#updateAudit").hide();
});
document.getElementById('updateBtn2').addEventListener('click', () => { 
    var user = $('#inputName1').val();
    var type1 = $('#inputTipo1').val();
    var desc = $('#inputDesc1').val();
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({            
        type:'get',
        url:"/update/"+ row.id,
        data:'contactFrmSubmit=1&name='+user+'&tipo='+type1+'&desc='+desc, 
    success: function() {
        alert('Actualizado con exito')
        $("#updateAudit").hide();
        $('#inputName1').val('');
        $('#inputTipo1').val('');
        $('#inputDesc1').val('');
        var ref = $('#tables').DataTable();
        ref.ajax.reload();
        }
    });
});
document.getElementById('deleteBtn2').addEventListener('click', () => {
    alert(row.id);
});