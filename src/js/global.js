let pathRoot = 'http://localhost/pos_system/';

//AJAX
function AsynCall(url, datos){
    return $.ajax({
        method: 'POST',
        url: `${pathRoot}${url}`,
        data: datos,
        cache: false
    });
}

//SweetAlert
function SweetAlert(title, text, icon){
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        footer: 'POS system',
        showConfirmButton: true,
    });
}

function Toast(_icon, _title){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000
      });

    Toast.fire({
        icon: _icon,
        title: _title
    });
}

//Toastr
var toastPositions = [
    'toast-top-right',
    'toast-bottom-right',
    'toast-bottom-left',
    'toast-top-left',
    'toast-top-full-width',
    'toast-bottom-full-width',
    'toast-top-center',
    'toast-bottom-center'
];

function ShowToastr(type, message, title, position = 6, duration = 1000){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": toastPositions[position],
        "onclick": null,
        "showDuration": duration,
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr[type](message, title);
}

//msg All
function msgCRUD(_icon, _msg){
    Toast(_icon, _msg);
}

//validation FORMs
let formsRules = [
    {//categories,unities
        rules: {
            nombre: "required",
            descripcion: "required"
        },
        messages:{
            nombre: "Ingrese nombre.",
            descripcion: "Ingrese descripción."
        }
    },
    {//suppliers
        rules: {
            nombre: "required",
            contacto: "required",
            direccion: "required",
            celular: "required"
        },
        messages:{
            nombre: "Ingrese nombre de proveedor",
            contacto: "Ingrese nombre de contacto",
            direccion: "Ingrese dirección de proveedor",
            celular: "Ingrese celular de proveedor"
        }
    }
];

//dataTables
var configDataTable = [
    {//categories
        language: {
            lengthMenu: "Ver _MENU_ por página",
            zeroRecords: "Sin resultados",
            info: "Página _PAGE_ de _PAGES_",
            infoEmpty: "Sin Registros",
            infoFiltered: "(filtro para _MAX_ resultados totales)",
            decimal: ".",
            thousands: ",",
            paginate: {
                first: "",
                last: "Última",
                next: "Siguiente",
                previous: "Anterior"
            },
            search: 'Buscar',
            searchPlaceholder: 'Ingrese su búsqueda',
            processing: '....Cargando....',
            loadingRecords: '....Cargando información....'
        }, 
        searching: true,
        autoWidth: true,
        retrieve: true,
        lengthMenu: [4,7],
        pageLength: 7
    }
];
