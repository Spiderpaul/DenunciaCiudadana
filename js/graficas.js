    let grafica1 = document.getElementById("grafica1").getContext("2d");

    var chart = new Chart(grafica1, {
        type: "bar",
        data: {
            labels:[1,2,3],
            datasets:[
                {
                    label:"Tipo de denuncia ciudadana",
                    backgroundColor:"rgb(255,165,0)",
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
            labels:[1,2,3,4,5,6,7,8],
            datasets:[
                {
                    label:"Asunto de denuncia",
                    backgroundColor:"rgb(255,165,0)",
                    borderColor:"rgb(106,28,50)",
                    data:[12,23,6,10,5,24,16,7] 
                }
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