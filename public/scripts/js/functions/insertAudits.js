
document.getElementById('submitForm').addEventListener('click', () => {
    var user = $('#User').val();
    var type1 = $('#Name').val();
    var desc = $('#Description').val();    
    var msg = '';
    
    var data = new FormData(document.getElementById('sendForm'));
    //const name= data.get('inputD');    
    const dataComplete = Object.fromEntries(data.entries());
    console.log(JSON.stringify(dataComplete));

    if(user.trim() == '' ){
        alert('Ingresa el usuario.');
        $('#User').focus();
        return false;
    }else if(type1.trim() == '' ){
        alert('Ingresa el tipo de Auditoria.');
        $('#Name').focus();
        return false;
    }else if(desc.trim() == '' ){
        alert('Ingresa la descripción.');
        $('#Description').focus();
        return false;
    }else{
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({            
            type:'post',
            url:'/store',
            //data:'formSubmit=1&name='+user+'&tipo='+type1+'&desc='+desc,
            data: JSON.stringify(dataComplete),
            dataType: "json",
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(response){ 
                var responseVal = response.success.toString();                          
                if(responseVal == 'true'){                    
                    $('#User').val('');
                    $('#Name').val('');
                    $('#Description').val('');
                    $('.statusMsg').html('<span style="color:green;">Auditoria Registrada</p>');                    
                    //var ref = $('#tables').DataTable();
                    //ref.ajax.reload();
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
    console.log(row.id);  
    $("#updateBtn1").show(); 
    $(this).addClass("selected").siblings().removeClass("selected");   
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
    //alert(row.User);
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

    var data = new FormData(document.getElementById('sendForm2'));
    const name= data.get('inputName1');    
    //alert(name);
    const dataComplete = Object.fromEntries(data.entries());
    console.log(JSON.stringify(dataComplete));

    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({            
        type:'post',
        url:"/update/"+ row.id,
        data: JSON.stringify(dataComplete),
        dataType: "json",
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
    //alert(row.id);
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({            
        type:'get',
        url:"/destroy/"+ row.id,
        data:'&id='+row.id, 
    success: function() {
        alert('Eliminado con exito')
        $("#updateAudit").hide();
        $('#inputName1').val('');
        $('#inputTipo1').val('');
        $('#inputDesc1').val('');
        var ref = $('#tables').DataTable();
        ref.ajax.reload();
        }
    });
});
