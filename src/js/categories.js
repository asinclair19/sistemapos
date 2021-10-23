//categories JS methods
let titleMsg = "POS Sistema: Categorías";
let table = $("#categoriesTable");
let mdl = $('#mdlCategory');
let formModal = $('#formCategoria');
let routeAsynCall = 'routes/ProductRoute.php';

$(function(){
    getCategories();
});

function getCategories(){
    AsynCall(routeAsynCall, {action: 'getCategories'})
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){
            msgCRUD('success', data.message);
            loadCategoriesOnTable(data);
        }else{
            msgCRUD('error', data.message);
        }
    }

    function failCallBack(error){
        msgCRUD('error', data.message);
    }
}

function loadCategoriesOnTable(data){
    table.DataTable(configDataTable[0]).destroy();
    let tr = '';
    if(data.state){
        let categories = data.categories;
        tr = categories.map(cat => {
            return `<tr${cat.activo == 0 ? ' class="text-danger"':''}>
                <td scope="row">${cat.idcategoria}</td>
                <td scope="row">${cat.nombre}</td>
                <td scope="row">${cat.descripcion}</td>
                <td scope="row">${cat.activo == 1 ? 'Si Activa':'No Activa'}</td>
                <td scope="row">
                    <a class="btn btn-sm btn-warning" onClick='editCategory(${cat.idcategoria})'>
                        <i class="fas fa-edit"></i> Editar</a>
                    <a class="btn btn-sm btn-primary" onClick='updateStateCategory(${cat.idcategoria},${cat.activo})'>
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

function updateStateCategory(_id, _state){ //delete
    let response = confirm('Desea eliminar el elemento actual?.');
    if(response){
        AsynCall(routeAsynCall, {action: 'updateStateCategory', id: _id, state: _state == 1 ? 0:1})
            .then(doneCallBack, failCallBack);

        function doneCallBack(response){
            debugger;
            let data = JSON.parse(response);
            if(data.state){
                msgCRUD('success',data.message);
                loadCategoriesOnTable(data);
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

function editCategory(_id){
    cleanMdl();
    AsynCall(routeAsynCall, {action: 'getCategoryById', id: _id})
            .then(doneCallBack, failCallBack);

    function doneCallBack(response){
        debugger;
        let data = JSON.parse(response);
        if(data.state){
            mdl.find('#txtid').val(data.category.idcategoria);
            mdl.find('#txtnombre').val(data.category.nombre);
            mdl.find('#txtdescripcion').val(data.category.descripcion);
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
            _action = 'insertCategory';
        }else{
            _action = 'updateCategory';
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
                loadCategoriesOnTable(data);
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