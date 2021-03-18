<script>


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
                                <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>
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
</script>