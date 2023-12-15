//                     data: values,
const ctx = document.getElementById('myChart');

//Fetch para traer los datos desde la base de datos
fetch('listar.php')
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
                    label: 'Cantidad de ventas',
                    data: values,
                    borderWidth: 1, 
                }]
            },
            options: {
                indexAxis: 'y'
              }
        });
    })
    .catch(error => console.error('Error fetching data:', error));