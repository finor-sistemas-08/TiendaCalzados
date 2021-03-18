<script>
    
    var arrayCalzados = [];
    var arrayCantidad = [];

    function marcaDato(marca){

        document.getElementById('calzados').innerHTML ='';
        var calzado ; 
        var fila = ``;
        url = '/web/marca?id=' + marca ;
        axios.get(url).then(function(response){
            console.log(response.data.marca[1].id);
            data = response.data.marca;
            console.log()        
            for (let index = 0; index < response.data.marca.length; index++) {
                fila = `   
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                        <img src="${data[index].imagen}" with="200" height="200" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <!-- Button trigger modal -->
                                    
                                    <a data-toggle="modal" data-target="#exampleModal" href="" onclick="seleccionarCalzado(${data[index].id})"  data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>
                                    <a  href="portfolio-details.html" title="More Details"><i class="icofont-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $("#calzados").append(fila);
            }
        });
    } 

    function seleccionarCalzado(id){
        url = '/web/buscarCalzado?id=' + id ;
        axios.get(url).then((response) => {
            console.log(response);
            console.log(response.data);
            console.log(response.data.calzado);
            console.log(response.data.calzado[0]);
            calzado = response.data.calzado[0];


            Swal.fire({
            title: 'Digite una cantidad',
            text: 'Modal with a custom image.',
           

            html: `
                <img src="${calzado.imagen}" with="200" height="200" class="img-fluid" alt="">
                <input type="number" id="cantidad" class="swal2-input form-control" placeholder="Cantidad">
            
                `,
            confirmButtonText: 'Añadir',
            focusConfirm: false,
            preConfirm: () => {
                const cantidad = Swal.getPopup().querySelector('#cantidad').value;
                this.arrayCalzados.push(calzado.id);
                this.arrayCantidad.push(cantidad);
                if (!cantidad  && cantidad <= 0) {
                Swal.showValidationMessage(`por favor ingrese una cantidad valida`)
                }
                return { cantidad: cantidad }
            }
            }).then((result) => {
            Swal.fire(`
                Muchas Gracias!
            `.trim())
            })
        });

    }
</script>