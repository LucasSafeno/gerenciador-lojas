<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titulo ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
  <section class="d-flex align-items-center min-vh-100 py-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-md-6 order-md-2">
          <div class="lc-block">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_kcsr6fcp.json" background="transparent" speed="1" loop="" autoplay=""></lottie-player>
          </div>
        </div>
        <div class="col-md-6 text-center text-md-start ">
          <div class="lc-block mb-3">
            <div editable="rich">
              <!-- <h1 class="fw-bold h4">PAGE NOT FOUND!<br></h1> -->
            </div>
          </div>
          <div class="lc-block mb-3">
            <div editable="rich">
              <h1 class="display-1 fw-bold text-muted">Erro 404</h1>

            </div>
          </div>
          <div class="lc-block mb-5">
            <div editable="rich">
              <p class="rfs-11 fw-light"><?= $mensagem ?></p>
            </div>
          </div>
          <div class="lc-block">
            <a class="btn btn-lg btn-secondary" href="/" role="button">Voltar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
