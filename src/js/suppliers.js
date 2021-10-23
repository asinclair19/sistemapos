//categories JS methods
let titleMsg = "POS Sistema: Proveedores";
let table = $("#infoTable");
let mdl = $('#mdlSupplier');
let formModal = $('#formSupplier');
let routeAsynCall = 'routes/StoreRoute.php';

$(function(){
    getData('getSuppliers'); //
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
                <td scope="row">${el.idproveedor}</td>
                <td scope="row">${el.nombre}</td>
                <td scope="row">${el.contacto}</td>
                <td scope="row">${el.direccion}</td>
                <td scope="row">${el.celular}</td>
                <td scope="row">${el.activo == 1 ? 'Si Activo':'No Activo'}</td>
                <td scope="row">
                    <a class="btn btn-sm btn-warning" onClick='edit(${el.idproveedor})'>
                        <i class="fas fa-edit"></i> Editar</a>
                    <a class="btn btn-sm btn-primary" onClick='updateState(${el.idproveedor},${el.activo})'>
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
        AsynCall(routeAsynCall, {action: 'updateStateSupplier', id: _id, state: _state == 1 ? 0:1}) //
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
    mdl.find('#txtnombre').val('');
    mdl.find('#txtcontacto').val('');
    mdl.find('#txtcelular').val('');
    mdl.find('#txtdireccion').val('');
    mdl.find('#txtciudad').val('');
    mdl.find('#txtregion').val('');
    mdl.find('#txtcodigo_postal').val('');
    mdl.find('#txtpais').val('');
}

function edit(_id){
    cleanMdl();
    AsynCall(routeAsynCall, {action: 'getSupplierById', id: _id}) //
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){
            mdl.find('#txtid').val(data.info.idproveedor); //
            mdl.find('#txtnombre').val(data.info.nombre);
            mdl.find('#txtcontacto').val(data.info.contacto);
            mdl.find('#txtcelular').val(data.info.celular);
            mdl.find('#txtdireccion').val(data.info.direccion);
            mdl.find('#txtciudad').val(data.info.ciudad);
            mdl.find('#txtregion').val(data.info.region);
            mdl.find('#txtcodigo_postal').val(data.info.codigoPostal);
            mdl.find('#txtpais').val(data.info.pais);
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
    formModal.validate(formsRules[1]);
    if(formModal.valid()){
        let _action = '';
        let _id = mdl.find('#txtid').val();
        let _nombre = mdl.find('#txtnombre').val();
        let _contacto = mdl.find('#txtcontacto').val();
        let _celular = mdl.find('#txtcelular').val();
        let _direccion = mdl.find('#txtdireccion').val();
        let _ciudad = mdl.find('#txtciudad').val();
        let _region = mdl.find('#txtregion').val();
        let _codigo_postal = mdl.find('#txtcodigo_postal').val();
        let _pais = mdl.find('#txtpais').val();

        if(_id == ''){
            _action = 'insertSupplier'; //
        }else{
            _action = 'updateSupplier'; //
        }

        let jsonData = {
            action: _action,
            nombre: _nombre,
            contacto: _contacto,
            celular: _celular,
            direccion: _direccion,
            ciudad: _ciudad,
            region: _region,
            codigo_postal: _codigo_postal,
            pais: _pais,
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