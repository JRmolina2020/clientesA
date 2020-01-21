var tabla;
function init() {
  index();
  store();
}

function index() {
  tabla = $("#list")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      ajax: {
        url: "../controller/cliente.php?op=index",
        type: "get",
        dataType: "json",
        error: function(e) {
          console.log(e.responseText);
        }
      },
      bDestroy: true,
      iDisplayLength: 5,
      order: [[0, "asc"]]
    })
    .DataTable();
}

function store(e) {
  $("#formu")
    .bootstrapValidator({
      fields: {}
    })
    .on("success.form.bv", function(e) {
      e.preventDefault();
      var formData = new FormData($("#formu")[0]);
      $.ajax({
        url: "../controller/cliente.php?op=update",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "EDITADO,ESPERE UN MOMENTO...",
            showConfirmButton: false,
            timer: 1000
          });
          limpiar();
          tabla.ajax.reload();
          $("#formu").bootstrapValidator("resetForm", true);
        }
      });
    });
}
function show(id) {
  $.post("../controller/cliente.php?op=show", { id: id }, function(
    data,
    status
  ) {
    data = JSON.parse(data);
    $("#nombre").val(data.nombre);
    $("#empresa").val(data.empresa);
    $("#tipo")
      .val(data.tipo)
      .change();
    $("#regimen")
      .val(data.regimen)
      .change();
    $("#iva")
      .val(data.iva)
      .change();
    $("#tipo_identi")
      .val(data.tipo_ident)
      .change();
    $("#id").val(data.id);
  });
}
function limpiar() {
  $("#nombre").val("");
  $("#empresa").val("");
  $("#regimen").val("");
  $("#iva").val("");
  $("#tipo_identi").val("");
  $("#tipo").val("");
  $("#id").val("");
}

init();
