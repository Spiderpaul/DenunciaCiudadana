fetch("servidor/graficatipo.php")
  .then((res) => res.json())
  .then((datos) => graficaTipo(datos))
  .catch((error) => console.log(error));

fetch("servidor/graficaasunto.php")
  .then((res) => res.json())
  .then((datos) => graficaAsunto(datos))
  .catch((error) => console.log(error));

fetch("servidor/graficaestatus.php")
  .then((res) => res.json())
  .then((datos) => graficaEstatus(datos))
  .catch((error) => console.log(error));

const meses = [
  "Ene",
  "Feb",
  "Mar",
  "Abr",
  "May",
  "Jun",
  "Jul",
  "Ago",
  "Sep",
  "Oct",
  "Nov",
  "Dic",
];

const graficaTipo = (datos) => {
  let grafica1 = document.getElementById("grafica1").getContext("2d");

  const denunciaA = {
    label: "Denuncia anónima",
    backgroundColor: "rgb(255,165,0)",
    borderColor: "rgb(0,0,0)",
    data: [
      datos["eneroDA"],
      datos["febreroDA"],
      datos["marzoDA"],
      datos["abrilDA"],
      datos["mayoDA"],
      datos["junioDA"],
      datos["julioDA"],
      datos["agostoDA"],
      datos["septiembreDA"],
      datos["octubreDA"],
      datos["noviembreDA"],
      datos["diciembreDA"],
    ],
  };

  const denunciaC = {
    label: "Denuncia ciudadana",
    backgroundColor: "rgb(255,87,51)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["eneroDC"],
      datos["febreroDC"],
      datos["marzoDC"],
      datos["abrilDC"],
      datos["mayoDC"],
      datos["junioDC"],
      datos["julioDC"],
      datos["agostoDC"],
      datos["septiembreDC"],
      datos["octubreDC"],
      datos["noviembreDC"],
      datos["diciembreDC"],
    ],
  };

  const denunciaSP = {
    label: "Denuncia servidor público",
    backgroundColor: "rgb(162,25,42)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["eneroDSP"],
      datos["febreroDSP"],
      datos["marzoDSP"],
      datos["abrilDSP"],
      datos["mayoDSP"],
      datos["junioDSP"],
      datos["julioDSP"],
      datos["agostoDSP"],
      datos["septiembreDSP"],
      datos["octubreDSP"],
      datos["noviembreDSP"],
      datos["diciembreDSP"],
    ],
  };

  var chart = new Chart(grafica1, {
    type: "bar",
    data: {
      labels: meses,
      datasets: [denunciaA, denunciaC, denunciaSP],
    },
  });
};

//                                                      Gráfica 2

const graficaEstatus = (datos) => {
  let grafica2 = document.getElementById("grafica2").getContext("2d");

  const enEspera = {
    label: "En espera",
    backgroundColor: "rgb(255,195,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero1"],
      datos["febrero1"],
      datos["marzo1"],
      datos["abril1"],
      datos["mayo1"],
      datos["junio1"],
      datos["julio1"],
      datos["agosto1"],
      datos["septiembre1"],
      datos["octubre1"],
      datos["noviembre1"],
      datos["diciembre1"],
    ],
  };

  const enProceso = {
    label: "En proceso",
    backgroundColor: "rgb(255,165,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero2"],
      datos["febrero2"],
      datos["marzo2"],
      datos["abril2"],
      datos["mayo2"],
      datos["junio2"],
      datos["julio2"],
      datos["agosto2"],
      datos["septiembre2"],
      datos["octubre2"],
      datos["noviembre2"],
      datos["diciembre2"],
    ],
  };

  const Finalizado = {
    label: "Finalizado",
    backgroundColor: "rgb(255,140,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero3"],
      datos["febrero3"],
      datos["marzo3"],
      datos["abril3"],
      datos["mayo3"],
      datos["junio3"],
      datos["julio3"],
      datos["agosto3"],
      datos["septiembre3"],
      datos["octubre3"],
      datos["noviembre3"],
      datos["diciembre3"],
    ],
  };

  const Cancelado = {
    label: "Cancelado",
    backgroundColor: "rgb(255,87,51)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero4"],
      datos["febrero4"],
      datos["marzo4"],
      datos["abril4"],
      datos["mayo4"],
      datos["junio4"],
      datos["julio4"],
      datos["agosto4"],
      datos["septiembre4"],
      datos["octubre4"],
      datos["noviembre4"],
      datos["diciembre4"],
    ],
  };

  const noAplica = {
    label: "No aplica",
    backgroundColor: "rgb(180,6,52)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero5"],
      datos["febrero5"],
      datos["marzo5"],
      datos["abril5"],
      datos["mayo5"],
      datos["junio5"],
      datos["julio5"],
      datos["agosto5"],
      datos["septiembre5"],
      datos["octubre5"],
      datos["noviembre5"],
      datos["diciembre5"],
    ],
  };

  var chart = new Chart(grafica2, {
    type: "bar",
    data: {
      labels: meses,
      datasets: [enEspera, enProceso, Finalizado, Cancelado, noAplica],
    },
  });
};

//                                    Gráfica 3

function graficaAsunto(datos) {
  let grafica3 = document.getElementById("grafica3").getContext("2d");

  const abuso = {
    label: "Abuso de autoridad",
    backgroundColor: "rgb(255,195,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero1"],
      datos["febrero1"],
      datos["marzo1"],
      datos["abril1"],
      datos["mayo1"],
      datos["junio1"],
      datos["julio1"],
      datos["agosto1"],
      datos["septiembre1"],
      datos["octubre1"],
      datos["noviembre1"],
      datos["diciembre1"],
    ],
  };

  const acoso = {
    label: "Acoso y hostigamiento",
    backgroundColor: "rgb(255,165,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero2"],
      datos["febrero2"],
      datos["marzo2"],
      datos["abril2"],
      datos["mayo2"],
      datos["junio2"],
      datos["julio2"],
      datos["agosto2"],
      datos["septiembre2"],
      datos["octubre2"],
      datos["noviembre2"],
      datos["diciembre2"],
    ],
  };

  const soborno = {
    label: "Soborno para algún trámite o servicio",
    backgroundColor: "rgb(255,140,0)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero3"],
      datos["febrero3"],
      datos["marzo3"],
      datos["abril3"],
      datos["mayo3"],
      datos["junio3"],
      datos["julio3"],
      datos["agosto3"],
      datos["septiembre3"],
      datos["octubre3"],
      datos["noviembre3"],
      datos["diciembre3"],
    ],
  };

  const incumplimiento = {
    label: "Incumplimiento o mal uso de un programa o acción social",
    backgroundColor: "rgb(255,87,51)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero4"],
      datos["febrero4"],
      datos["marzo4"],
      datos["abril4"],
      datos["mayo4"],
      datos["junio4"],
      datos["julio4"],
      datos["agosto4"],
      datos["septiembre4"],
      datos["octubre4"],
      datos["noviembre4"],
      datos["diciembre4"],
    ],
  };

  const trato = {
    label: "Trato irrespetuoso y mala conducta",
    backgroundColor: "rgb(210,105,30)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero5"],
      datos["febrero5"],
      datos["marzo5"],
      datos["abril5"],
      datos["mayo5"],
      datos["junio5"],
      datos["julio5"],
      datos["agosto5"],
      datos["septiembre5"],
      datos["octubre5"],
      datos["noviembre5"],
      datos["diciembre5"],
    ],
  };

  const servidor = {
    label:
      "Servidor público autorisa, solicita o realiza actos para su beneficio",
    backgroundColor: "rgb(180,6,52)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero6"],
      datos["febrero6"],
      datos["marzo6"],
      datos["abril6"],
      datos["mayo6"],
      datos["junio6"],
      datos["julio6"],
      datos["agosto6"],
      datos["septiembre6"],
      datos["octubre6"],
      datos["noviembre6"],
      datos["diciembre6"],
    ],
  };

  const solicitud = {
    label:
      "Solicitud de documentos o dinero adicional para la expedición de documentos",
    backgroundColor: "rgb(144,12,63)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero7"],
      datos["febrero7"],
      datos["marzo7"],
      datos["abril7"],
      datos["mayo7"],
      datos["junio7"],
      datos["julio7"],
      datos["agosto7"],
      datos["septiembre7"],
      datos["octubre7"],
      datos["noviembre7"],
      datos["diciembre7"],
    ],
  };

  const otro = {
    label: "Otro",
    backgroundColor: "rgb(88,24,69)",
    borderColor: "rgb(106,28,50)",
    data: [
      datos["enero8"],
      datos["febrero8"],
      datos["marzo8"],
      datos["abril8"],
      datos["mayo8"],
      datos["junio8"],
      datos["julio8"],
      datos["agosto8"],
      datos["septiembre8"],
      datos["octubre8"],
      datos["noviembre8"],
      datos["diciembre8"],
    ],
  };

  var chart = new Chart(grafica3, {
    type: "bar",
    data: {
      labels: meses,
      datasets: [
        abuso,
        acoso,
        soborno,
        incumplimiento,
        trato,
        servidor,
        solicitud,
        otro,
      ],
    },
  });
}
