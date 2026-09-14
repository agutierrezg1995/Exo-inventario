function animarNumero(elemento, destino, prefijo = "") {
  const valorFinal = Number(destino) || 0;
  const inicio = performance.now();
  const duracion = 650;

  function actualizar(ahora) {
    const progreso = Math.min((ahora - inicio) / duracion, 1);
    const suavizado = 1 - Math.pow(1 - progreso, 3);
    elemento.textContent = prefijo + Math.round(valorFinal * suavizado).toLocaleString("es-ES");
    if (progreso < 1) {
      requestAnimationFrame(actualizar);
    }
  }

  requestAnimationFrame(actualizar);
}

function home() {
  $.ajax({
    type: "POST",
    url: "/datosHome",
    data: {
      csrf_test_name: $("meta[name='X-CSRF-TOKEN']").attr("content"),
    },
    dataType: "json",
    success: (data) => {
      let tabla = document.getElementById("productos-criticos");
      let clientes = document.getElementById("clientes");
      let ventas = document.getElementById("ventas");
      let gastos = document.getElementById("gastos");
      let provedores = document.getElementById("provedores");
      let totalProductos = document.getElementById("total-productos");
      let unidadesDisponibles = document.getElementById("unidades-disponibles");
      let alertasStock = document.getElementById("alertas-stock");
      tabla.innerHTML = "";
      if (data.productos.length > 0) {
        for (producto of data.productos) {
          let fila = `
                        <td>${producto.nombre_producto}</td>
                        <td class="text-center">${producto.stock}</td>
                        <td class="text-center">${producto.stock_critico}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="edit(${producto.id})" title="Editar producto">
                              <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        `;
          let btn = document.createElement("TR");
          btn.innerHTML = fila;
          tabla.appendChild(btn);
        }
      } else {
        let fila = `<tr>
                    <td class="text-center" colspan="5">No hay datos en esta tabla</td>
                  </tr>`;
        tabla.innerHTML = fila;
      }
      animarNumero(clientes, data.clientes);
      animarNumero(provedores, data.provedores);
      animarNumero(totalProductos, data.total_productos);
      animarNumero(unidadesDisponibles, data.unidades_disponibles);
      animarNumero(alertasStock, data.alertas_stock);
      animarNumero(ventas, data.operaciones.ventas, "$ ");
      animarNumero(gastos, data.operaciones.gastos, "$ ");
    },
    error: (xhr, ajaxOption, thrownError) =>
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError),
  });
}

function edit(id) {
  $.ajax({
    type: "POST",
    url: "producto/editar",
    data: {
      id: id,
      csrf_test_name: $("meta[name='X-CSRF-TOKEN']").attr("content"),
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $(".viewmodal").html(response.success);
        $("#producto-editar-modal").modal("show");
      }
    },
    error: function (xhr, ajaxOption, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
home();

// var ctx = document.getElementById("ventasReporte").getContext("2d");
// var myChart = new Chart(ctx, {
//   type: "bar",
//   data: {
//     labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//     datasets: [
//       {
//         label: "# of Votes",
//         data: [12, 19, 3, 5, 2, 3],
//         backgroundColor: [
//           "rgba(255, 99, 132, 0.2)",
//           "rgba(54, 162, 235, 0.2)",
//           "rgba(255, 206, 86, 0.2)",
//           "rgba(75, 192, 192, 0.2)",
//           "rgba(153, 102, 255, 0.2)",
//           "rgba(255, 159, 64, 0.2)",
//         ],
//         borderColor: [
//           "rgba(255, 99, 132, 1)",
//           "rgba(54, 162, 235, 1)",
//           "rgba(255, 206, 86, 1)",
//           "rgba(75, 192, 192, 1)",
//           "rgba(153, 102, 255, 1)",
//           "rgba(255, 159, 64, 1)",
//         ],
//         borderWidth: 1,
//       },
//     ],
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true,
//       },
//     },
//   },
// });
