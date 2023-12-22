function chart1(){
    const ctx = document.getElementById('myChart');

//Fetch para traer los datos desde la base de datos
fetch('obtenerDatosG1.php')
.then(response => response.json())
    .then(data => {
        
        //recorro el data con el map y asigno los valores que corresponden para los parametros del grafico (labels y values)
        const labels = data.map(item => item.nombre);  // Usa los nombres como etiquetas
        const values = data.map(item => item.cant_ventas); // Usa la cantidad como valores
        
        // Configurar el gráfico con los datos dinámicos
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de ventas por vendedor',
                    data: values,
                    borderWidth: 3,                    
                    borderColor: '#FFE5E5',
                    backgroundColor: 'rgba(172, 135, 197, 3)',
                    color: '#B80000'
                                                         
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                  legend: {
                      position: 'top',
                      labels: {
                        color: 'rgba(117, 106, 182, 1)',
                          
                          font: {
                              size: 20
                          }
                      }
                  },                  
              }
              }
        });
    })
    .catch(error => console.error('Error fetching data:', error));
}

function chart2(){
const ctx = document.getElementById('myChart2');

//Fetch para traer los datos desde la base de datos
fetch('obtenerDatosG2.php')
.then(response => response.json())
    .then(data => {
        
        //recorro el data con el map y asigno los valores que corresponden para los parametros del grafico (labels y values)
        const labels = data.map(item => item.categoriaNombre);  // Usa los nombres como etiquetas
        const values = data.map(item => item.totalStockPorCategoria); // Usa la cantidad como valores
        new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Cantidad en stock por categoria',
                data: values,
                borderWidth: 3,                    
                borderColor: '#FFE5E5',
                backgroundColor: 'rgba(172, 135, 197, 3)',
                color: '#B80000'
                                                     
            }],
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              },
              plugins: {
                legend: {
                    position: 'top',
                    labels: {
                      color: 'rgba(117, 106, 182, 1)',
                        
                        font: {
                            size: 20
                        }
                    }
                },                  
            }
            }
          });
        
        
    })
    .catch(error => console.error('Error fetching data:', error));
}

function chart3(){
    const ctx = document.getElementById('myChart3');
    
    //Fetch para traer los datos desde la base de datos
    fetch('obtenerDatosG3.php')
    .then(response => response.json())
        .then(data => {
            //recorro el data con el map y asigno los valores que corresponden para los parametros del grafico (labels y values)
            const labels = data.map(item => item.Ano);  // Usa los nombres como etiquetas
            const values = data.map(item => item.TotalVentas); // Usa la cantidad como valores
            new Chart(ctx, {
                type: 'line',
                data: {
                  labels: labels,
                  datasets: [{
                    label: 'Total de ventas por año ',
                    data: values,
                    borderWidth: 3,                    
                    
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  },
                  plugins: {
                    legend: {
                        position: 'top',
                        labels: {                           
                            font: {
                                size: 20
                            }
                        }
                    },                  
                }
                }
                
              });
            
            
        })
        .catch(error => console.error('Error fetching data:', error));
}
    
function chart4(){
        const ctx = document.getElementById('myChart4');
        
        //Fetch para traer los datos desde la base de datos
        fetch('obtenerDatosG4.php')
        .then(response => response.json())
            .then(data => {
                
                //recorro el data con el map y asigno los valores que corresponden para los parametros del grafico (labels y values)
                const labels = data.map(item => item.Mes);  // Usa los nombres como etiquetas
                const values = data.map(item => item.totalVentasPorMes); // Usa la cantidad como valores
                new Chart(ctx, {
                    type: 'line',
                    data: {
                      labels: labels,
                      datasets: [{
                        label: 'Cantidad de ventas por mes en 2023',
                        data: values,
                        borderWidth: 3                    
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      },
                      plugins: {
                        legend: {
                            position: 'top',
                            labels: {                           
                                font: {
                                    size: 20
                                }
                            }
                        },                  
                    }
                    }
                  });
                
                
            })
            .catch(error => console.error('Error fetching data:', error));
}