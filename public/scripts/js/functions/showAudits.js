document.getElementById("showaudi").onclick = function() { 
        var table = '';
       table =  $('#tables').DataTable({
            retrieve: true,
            processing: true,
            serverSide: false,
            searching: true,
            pageLength: 7,
            lengthChange: false,
            info: false,
            select: true,                       
            ajax: '/show',
            columns: [
                { data: 'id', title: 'Id', visible: true },
                { data: 'User', title: 'Usuario', visible: true },
                { data: 'Name', title: 'Nombre', visible: true }, 
                { data: 'Description', title: 'Descripción', visible: true },               
            ],    
            
        });
    };