document.getElementById('inputType').addEventListener('change', () => {
        table =  $('#table2').DataTable({
                    retrieve: true,
                    processing: true,
                    serverSide: false,
                    searching: false,
                    pageLength: 5,
                    lengthChange: false,
                    info: false,
                    fixedHeader: true,                       
                    ajax: '/show',
                    columns: [
                        { data: 'id', title: 'Id', visible: true },
                        { data: 'User', title: 'Usuario', visible: true },
                        { data: 'Name', title: 'Nombre', visible: true }, 
                        { data: 'Description', title: 'Descripción', visible: true },               
                    ],                
                });               
        var value = $("#inputType option:selected").val();
        
            if (value == 'empty'){ 
                $("#displayNone").hide();
            }else{
                var selection = $("#inputType option:selected").val();                
                $("#displayNone").show();
            }
    });