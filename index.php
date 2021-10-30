<?php
//include config
require_once('config.php');



$title = 'PHP Registration and Login Demo :-Home';

//include header template
require_once('header.php');

?>
<main>
<div id="main ">
  <div class="container mainTest">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/protecting_the_environment.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h3>slide label</h3>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/rotary_diversity.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h3>slide label</h3>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/goodbye_polio_thankyou_rotary.jpg" class="d-block w-100" alt="..." />
          <div class="carousel-caption d-md-block">
            <h3>slide label</h3>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row mt-2">
      <div class="col-md-8 col-sm-12">
        <div class="content-left">
          <div class="card" style="width: 100%">
            <h1 class="card-title align-self-center"><i class="fa fa-info-circle blue-text" aria-hidden="true"></i> About Us</h1>
            <h2 class="card-title align-self-center home-color">Enfield Chase</h2>
            <h2 class="card-title align-self-center">London - UK</h2>
            <img src="./images/Diversity.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <p class="card-text">
                Rotary is a global network of 1.2 million individuals who together see a world where people unite and take action to create
                lasting change - across the globe, in our communities, and in ourselves.
              </p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">We believe that society works better when it works together.</li>
                <li class="list-group-item">Each of us can help our home cities, towns and villages become better places to live.</li>
                <li class="list-group-item">Because it's these places, and the people within them, that have made us who we are.</li>
                <li class="list-group-item">And we put them to real use, to help others achieve their goals at home and abroad.</li>
              </ul>
            </div>
          </div>
          <h4 class="red text-center">For more information, see our</h4>
          <h3 class="blue text-center mb-4">NEWS PAGE</h3>
          <div class="d-flex justify-content-center">
            <img src="./images/People_of_Action_5.jpg" alt="People_of_Action" class="img-fluid mx-auto mt-4" />
          </div>

          <div class="red text-center mt-4">If you would like to visit one of our meetings, please contact</div>
          <div class="x-large text-center"><a href="http://">secretary@enfieldchaserotary.org</a></div>
          <div class="x-large text-center blue mt-4">#enfieldchaserotary</div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="content-right">
          <div class="card mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="card mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="card mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="card mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="card mt-2" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <p>More Content</p>
              <div class="d-grid gap-2">
                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
?>

<?php
//include header template
require('footer.php');
