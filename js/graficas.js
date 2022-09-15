    let grafica1 = document.getElementById("grafica1").getContext("2d");

    var chart = new Chart(grafica1, {
        type: "bar",
        data: {
            labels:["Denuncia ciudadana","Denuncia anónima","Denuncia servidor público"],
            datasets:[
                {
                    label:"Estadísticas de denuncia ciudadana",
                    backgroundColor:"rgb(77,77,77)",
                    borderColor:"rgb(106,28,50)",
                    data:[70,30,40] 
                }
            ]
        }
    })

    let grafica2 = document.getElementById("grafica2").getContext("2d");

    var chart = new Chart(grafica2, {
        type: "bar",
        data: {
            labels:["Acoso","Soborno","Malos manejos"],
            datasets:[
                {
                    label:"Estadísticas de denuncia ciudadana",
                    backgroundColor:"rgb(77,77,77)",
                    borderColor:"rgb(106,28,50)",
                    data:[12,23,6] 
                }
            ]
        }
    })