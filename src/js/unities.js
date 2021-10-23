//categories JS methods
let titleMsg = "POS Sistema: Unidades";
let table = $("#infoTable");
let mdl = $('#mdlUnity');
let formModal = $('#formUnity');
let routeAsynCall = 'routes/ProductRoute.php';

$(function(){
    getData('getUnities');
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
        tr = info.map(el => {
            return `<tr${el.activo == 0 ? ' class="text-danger"':''}>
                <td scope="row">${el.idunidad}</td>
                <td scope="row">${el.nombre}</td>
                <td scope="row">${el.descripcion}</td>
                <td scope="row">${el.activo == 1 ? 'Si Activa':'No Activa'}</td>
                <td scope="row">
                    <a class="btn btn-sm btn-warning" onClick='edit(${el.idunidad})'>
                        <i class="fas fa-edit"></i> Editar</a>
                    <a class="btn btn-sm btn-primary" onClick='updateState(${el.idunidad},${el.activo})'>
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
        AsynCall(routeAsynCall, {action: 'updateStateUnity', id: _id, state: _state == 1 ? 0:1})
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

function cleanMdl(){
    mdl.find('#txtid').val('');
    mdl.find('#txtnombre').val('');
    mdl.find('#txtdescripcion').val('');
}

function edit(_id){
    cleanMdl();
    AsynCall(routeAsynCall, {action: 'getUnityById', id: _id}) //
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){
            mdl.find('#txtid').val(data.info.idunidad); //
            mdl.find('#txtnombre').val(data.info.nombre);
            mdl.find('#txtdescripcion').val(data.info.descripcion);
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
    formModal.validate(formsRules[0]);
    if(formModal.valid()){
        let _action = '';
        let _id = mdl.find('#txtid').val();
        let _nombre = mdl.find('#txtnombre').val();
        let _descripcion = mdl.find('#txtdescripcion').val();

        if(_id == ''){
            _action = 'insertUnity'; //
        }else{
            _action = 'updateUnity'; //
        }

        let jsonData = {
            action: _action,
            nombre: _nombre,
            descripcion: _descripcion,
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