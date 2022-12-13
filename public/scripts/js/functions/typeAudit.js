document.getElementById('submitFormType').addEventListener('click', () => {
    var type1 = $('#inputTypeAudit').val();
    var desc = $('#inputDescAudit').val();    
    var msg = '';
    var data = new FormData(document.getElementById('sendForm2'));
    //const name= data.get('inputName1');    
    //alert(name);
    const dataComplete = Object.fromEntries(data.entries());
    console.log(JSON.stringify(dataComplete));
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
            //data:'contactFrmSubmit=1&tipo='+type1+'&desc='+desc,
            data:'contactFrmSubmit=1&name='+type1+'&tipo='+type1+'&desc='+desc,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(response){ 
                var responseVal = response.success.toString();                          
                if(responseVal == 'true'){                     
                    $('#inputTypeAudit').val('');
                    $('#inputDescAudit').val('');
                    $('.statusMsg2').html('<span style="color:green;">Auditoria Registrada</p>');                    
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