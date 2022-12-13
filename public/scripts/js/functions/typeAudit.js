document.getElementById('submitFormType').addEventListener('click', () => {
    var type1 = $('#inputTypeAudit').val();
    var desc = $('#inputDescAudit').val();    
    var msg = '';
    var data = new FormData(document.getElementById('sendAudit'));    
    const dataComplete = Object.fromEntries(data.entries());
    //console.log(JSON.stringify(dataComplete));
    if(type1.trim() == '' ){
        alert('Ingresa el tipo de Auditoria.');
        $('#inputTypeAudit').focus();
        return false;
    }else if(desc.trim() == '' ){
        alert('Ingresa la descripción.');
        $('#inputDescAudit').focus();
        return false;
    }else{
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({            
            type:'post',
            url:'/storetype',
            data: JSON.stringify(dataComplete),
            dataType: "json",
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(response){ 
                var responseVal = response.success.toString();                          
                if(responseVal == 'true'){          
                    var opt = $("#inputTypeAudit").val();
                    $("#inputTipo1").append("<option>" + opt + "</option>");
                    $("#Name").append("<option>" + opt + "</option>"); 
                    $("#inputType").append("<option>" + opt + "</option>");           
                    $('#inputTypeAudit').val('');
                    $('#inputDescAudit').val('');
                    $('.statusMsg2').html('<span style="color:green;">Auditoria Registrada</p>');                         
                    alert(opt);               
                }else{
                    $('.statusMsg2').html('<span style="color:red;">Ocurrio un problema, por favor intentalo de nuevo</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
                //var ref = $('#tables').DataTable();
                //ref.ajax.reload();
            }
        });
    }
});