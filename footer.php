<?php

?>
<footer>
  <div class="container-fluid ft-test mt-2">
    <div class="row">
      <div class="container">
        <div class="d-flex footer-w justify-content-center">
          <div class="row">
            <div class="col-sm-12 col-md-6 pt-3 text-center">
              <h6>POPULAR PAGES</h6>
              aaaa <br />
              bbbb<br />
              cccc<br />
            </div>

            <div class="col-sm-12 col-md-6 text-center pt-3">
              <h6>LINKS & NEWS</h6>
              Rotary International <br />
              bbbb<br />
              cccc<br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- <a class="fab fa-twitter"></a>
<a class="fab fa-facebook-f"></a>
<a class="fab fa-pinterest"></a>
<a class="fab fa-instagram"></a>
<a class="fab fa-google-plus-g"></a> -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  let scrollPos = 0
  const nav = document.querySelector(".navbar")

  function checkPosition() {
    let windowY = window.scrollY
    if (windowY < scrollPos) {
      // Scrolling UP
      nav.classList.add("d-block")
      nav.classList.remove("d-none")
    } else if (scrollPos > 150) {
      // Scrolling DOWN
      nav.classList.add("d-none")
      nav.classList.remove("d-block")
    }
    scrollPos = windowY
  }

  window.addEventListener("scroll", checkPosition)

  window.onbeforeunload = confirmExit;

  function confirmExit() {
    <?php
    if (isset($_SESSION['pageLeave'])) {
    ?>
      const statsExit = {
        axios: true,
        leave_id: '<?php echo $_SESSION['pageLeave'] ?>'
      };
      axios.post('./includes/axios.php', JSON.stringify(statsExit))
        .then(response => console.log(response.data));
    <?php
    }
    ?>


  }
</script>
</body>

</html>