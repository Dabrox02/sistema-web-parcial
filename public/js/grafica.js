export default function graficaInicio() {
  axios
    .get("../controllers/contacto/obtenere.php")
    .then(function (response) {
      const datos = response.data;
      crearGrafica(datos);
    })
    .catch(function (error) {
      console.log("Error al obtener los datos:", error);
    });
}

function crearGrafica(datos) {
  let arreglo = Object.values(datos);
  let dominios = arreglo.map((objeto) => objeto["dominio"]);
  let cantidades = arreglo.map((objeto) => objeto["cantidad"]);

  // Crear un gráfico de barras con Chart.js
  let ctx = document.getElementById("grafica").getContext("2d");
  let grafica = new Chart(ctx, {
    type: "bar",
    data: {
      labels: dominios,
      datasets: [
        {
          label: "Cantidad de Diferentes Emails Contacto",
          data: cantidades,
          backgroundColor: [
            "rgba(66, 242, 245, 0.5)",
            "rgba(114, 242, 191, 0.5)",
            "rgba(184, 148, 242, 0.5)",
          ],
          borderColor: [
            "rgba(66, 242, 245, 1)",
            "rgba(114, 242, 191, 1)",
            "rgba(184, 148, 242, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      options: {
        responsive: false,
        maintainAspectRatio: false,
      },
    },
  });
}
