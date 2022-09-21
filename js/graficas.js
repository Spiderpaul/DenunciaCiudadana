fetch('servidor/graficatipo.php')
    .then(res => res.json())
    .then(datos => graficaTipo(datos))
    .catch(error => console.log(error));

const meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

const graficaTipo = (datos) => {

let grafica1 = document.getElementById("grafica1").getContext("2d");

const denunciaA = {
    label:"Denuncia anónima",
    backgroundColor:"rgb(220,12,03)",
    borderColor:"rgb(0,0,0)",
    data:[
        datos['eneroDA'], datos['febreroDA'], datos['marzoDA'], datos['abrilDA'], datos['mayoDA'],
        datos['junioDA'], datos['julioDA'], datos['agostoDA'], datos['septiembreDA'], datos['octubreDA'],
        datos['noviembreDA'], datos['diciembreDA'],
    ] 
};

const denunciaC = {
    label:"Denuncia ciudadana",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[
        datos['eneroDC'], datos['febreroDC'], datos['marzoDC'], datos['abrilDC'], datos['mayoDC'],
        datos['junioDC'], datos['julioDC'], datos['agostoDC'], datos['septiembreDC'], datos['octubreDC'],
        datos['noviembreDC'], datos['diciembreDC'],
    ] 
};

const denunciaSP = {
    label:"Denuncia servidor público",
    backgroundColor:"rgb(162,25,42)",
    borderColor:"rgb(106,28,50)",
    data:[
        datos['eneroDSP'], datos['febreroDSP'], datos['marzoDSP'], datos['abrilDSP'], datos['mayoDSP'],
        datos['junioDSP'], datos['julioDSP'], datos['agostoDSP'], datos['septiembreDSP'], datos['octubreDSP'],
        datos['noviembreDSP'], datos['diciembreDSP'],
    ] 
};

var chart = new Chart(grafica1, {
    type: "bar",
    data: {
        labels: meses,
        datasets:[
            denunciaA,
            denunciaC,
            denunciaSP
        ]
    }
})

}

//                                                      Gráfica 2

let grafica2 = document.getElementById("grafica2").getContext("2d");

const abuso = {
    label:"Abuso de autoridad",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[36,14,52,45,12,3,65,21,4,5,4,12]
};

const acoso = {
    label:"Abuso de autoridad",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[23,45,74,85,44,11,54,26,35,25,14,1]
};

const soborno = {
    label:"Soborno para algún trámite o servicio",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[8,45,42,1,26,45,21,64,23,22,44,78]
};


const incumplimiento = {
    label:"Incumplimiento o mal uso de un programa o acción social",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[62,47,14,25,96,52,41,25,10,12,0,12]
};

const trato = {
    label:"Trato irrespetuoso y mala conducta",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[31,45,15,2,47,85,0,14,57,48,65,21,4]
};

const servidor = {
    label:"Servidor público autorisa, solicita o realiza actos para su beneficio",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[12,33,52,52,15,45,78,65,21,14,54,58]
};

const solicitud = {
    label:"Solicitud de documentos o dinero adicional para la expedición de documentos",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[52,20,45,50,41,65,23,15,45,78,45,12]
};

const otro = {
    label:"Otro",
    backgroundColor:"rgb(255,165,0)",
    borderColor:"rgb(106,28,50)",
    data:[120,30,45,12,54,15,42,3,54,74,87,41]
};

var chart = new Chart(grafica2, {
    type: "bar",
    data: {
        labels: meses,
        datasets:[
            abuso,
            acoso,
            soborno,
            incumplimiento,
            trato,
            servidor,
            solicitud,
            otro    
        ]
    }
})

let grafica3 = document.getElementById("grafica3").getContext("2d");

var chart = new Chart(grafica3, {
    type: "bar",
    data: {
        labels:[1,2,3,4],
        datasets:[
            {
                label:"Estatus de denuncia",
                backgroundColor:"rgb(255,165,0)",
                borderColor:"rgb(106,28,50)",
                data:[23,5,16,7] 
            }
        ]
    }
})