document.getElementById('submitForm').addEventListener('click', () => {
    var user = $('#inputName').val();
    var type1 = $('#inputTipo').val();
    var desc = $('#inputDesc').val();
    var token = '{{ csrf_token() }}';
    var msg = '';
    
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