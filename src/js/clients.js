//Clients JS methods
let titleMsg = "POS Sistema: Clientes"; //
let table = $("#infoTable");
let mdl = $('#mdlData');
let formModal = $('#formData');
let routeAsynCall = 'routes/SalesRoute.php'; //

//validation FORM INSERT/UPDATE
let rulesForm =
    { //
        rules: {
            nombre: "required",
            apellido: "required",
            celular: "required"
        },
        messages:{
            nombre: "* Requerído",
            apellido: "* Requerído",
            celular: "* Requerído"
        }
    };

$(function(){
    getData('getClients'); //
});

function getData(_action){
    AsynCall(routeAsynCall, {action: _action})
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){
            msgCRUD('success', data.message);
            loadDataOnTable(data);
        }else{
            msgCRUD('error', data.message);
        }
    }

    function failCallBack(error){
        msgCRUD('error', data.message);
    }
}

function loadDataOnTable(data){
    table.DataTable(configDataTable[0]).destroy();
    //build body
    let tr = '';
    if(data.state){
        let info = data.info;
        tr = info.map(el => { //
            return `<tr${el.activo == 0 ? ' class="text-danger"':''}>
                <td scope="row">${el.idcliente}</td>
                <td scope="row">${el.nombre}</td>
                <td scope="row">${el.apellido}</td>
                <td scope="row">${el.celular}</td>
                <td scope="row">${el.activo == 1 ? 'Si Activo':'No Activo'}</td>
                <td scope="row">
                    <a class="btn btn-sm btn-warning" onClick='edit(${el.idcliente})'>
                        <i class="fas fa-edit"></i> Editar</a>
                    <a class="btn btn-sm btn-primary" onClick='updateState(${el.idcliente},${el.activo})'>
                        <i class="fas fa-sort"></i> Estado</a>
                </td>
            </tr>`;
        });        
    }else{
        tr = `<tr><td><span class="label label-danger">${data.message}</span></td></tr>`;
    }
    table.find('tbody').empty().append(tr);
    table.DataTable(configDataTable[0]);
}

function updateState(_id, _state){ //delete
    let response = confirm('Desea cambiar el estado del elemento actual?.');
    if(response){
        AsynCall(routeAsynCall, {action: 'updateStateClient', id: _id, state: _state == 1 ? 0:1}) //
            .then(doneCallBack, failCallBack);

        function doneCallBack(response){
            debugger;
            let data = JSON.parse(response);
            if(data.state){
                msgCRUD('success',data.message);
                loadDataOnTable(data);
            }else{
                msgCRUD('warning', data.message);
            }
        }

        function failCallBack(error){
            msgCRUD('error', 'error');
        }
    }
}

function cleanMdl(){ //
    mdl.find('#txtid').val('');
    mdl.find('#txttipodocumento').val('');
    mdl.find('#txtnumdocumento').val('');
    mdl.find('#txtnombre').val('');
    mdl.find('#txtapellido').val('');
    mdl.find('#txtdireccion').val('');
    mdl.find('#txtcelular').val('');
    mdl.find('#txtcorreo').val('');
}

function edit(_id){
    cleanMdl();
    AsynCall(routeAsynCall, {action: 'getClientById', id: _id}) //
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){ //
            mdl.find('#txtid').val(data.info.idcliente);
            mdl.find('#txttipodocumento').val(data.info.tipo_documento);
            mdl.find('#txtnumdocumento').val(data.info.num_documento);
            mdl.find('#txtnombre').val(data.info.nombre);
            mdl.find('#txtapellido').val(data.info.apellido);
            mdl.find('#txtdireccion').val(data.info.direccion);
            mdl.find('#txtcelular').val(data.info.celular);
            mdl.find('#txtcorreo').val(data.info.email);
            mdl.modal('show');
        }else{
            msgCRUD('error', data.message);
        }
    }

    function failCallBack(error){
        msgCRUD('error', data.message);
    }
}

$('#btnNuevo').click(function (e) { //nuevo registro
    cleanMdl();
    mdl.modal('show');
});

mdl.find('#btnGuardar').click((e) => { //update / insert
    formModal.validate(rulesForm);
    if(formModal.valid()){ //
        let _action = '';
        let _id = mdl.find('#txtid').val();
        let _tipoDocumento = mdl.find('#txttipodocumento').val();
        let _numDocumento = mdl.find('#txtnumdocumento').val();
        let _nombre = mdl.find('#txtnombre').val();
        let _apellido = mdl.find('#txtapellido').val();
        let _direccion = mdl.find('#txtdireccion').val();
        let _celular = mdl.find('#txtcelular').val();
        let _correo = mdl.find('#txtcorreo').val();

        if(_id == ''){
            _action = 'insertClient'; //
        }else{
            _action = 'updateClient'; //
        }

        let jsonData = { //
            action: _action,
            tipo_documento: _tipoDocumento,
            num_documento: _numDocumento,
            nombre: _nombre,
            apellido: _apellido,
            celular: _celular,
            direccion: _direccion,
            email: _correo,
            id: _id
        }    
        AsynCall(routeAsynCall, jsonData)
            .then(doneCallBack, failCallBack);

        function doneCallBack(response){
            debugger;
            let data = JSON.parse(response);
            if(data.state){
                msgCRUD('success',data.message);
                loadDataOnTable(data);
            }else{
                msgCRUD('warning', data.message);
            }
            mdl.modal('hide');
        }

        function failCallBack(error){
            msgCRUD('error', 'error');
            mdl.modal('hide');
        }
    }
});