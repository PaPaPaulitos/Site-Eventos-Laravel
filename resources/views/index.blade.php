@extends('template.template')

@section('title','Dracula Events')

@section('content')
<style> 
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl{
  --bs-gutter-x:none;

}

img{
  width: 90vh;

}

h2{
  margin-top: 20px;
  margin-bottom: 20px;
  text-align: center;

}

</style>

<div class="container-fluid">
    <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/img/banner.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>Bem-vindo a Dracula Events</h3>
              <p>Veja nossos eventos em EVENTOS</p>
              <a class="botao botao-primario" href="/events/created">Clique aqui</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/img/banner.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>Bem-vindo a Dracula Events</h3>
              <p>Crie Eventos</p>
              <a class="botao botao-primario" href="/events/create">Clique aqui</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/img/banner.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>Bem-vindo a Dracula Events</h3>
              <p>Cadastre-se</p>
              <a class="botao botao-primario" href="/events/register">Clique aqui</a>
            </div>
          </div>
        </div>
      </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <h2>Lorem Impsum</h2>
      </div>
      <div class="col-sm">
      </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi condimentum ipsum finibus, hendrerit augue eu, imperdiet leo. Sed id lectus suscipit ipsum scelerisque viverra id non arcu. Etiam facilisis lacus nec ante sagittis aliquam. Morbi tincidunt risus vitae nisl mollis sodales. Donec hendrerit magna vehicula ipsum consectetur iaculis. Maecenas sit amet diam ut elit vestibulum hendrerit. Quisque vel mi sit amet dolor egestas consequat. Mauris et orci sed sem placerat luctus. Aliquam sed lorem urna. Curabitur sit amet tortor in neque interdum suscipit et eu erat. Etiam gravida sagittis purus, eu feugiat nisi tincidunt vitae. Donec ullamcorper neque in neque accumsan, ac mollis lorem consectetur. Donec vehicula ante non nulla lobortis, quis blandit nulla vehicula. Suspendisse sem magna, tincidunt porta hendrerit vel, gravida eu justo.

      Etiam posuere ligula non est blandit, non venenatis arcu semper. Nam pharetra elementum tortor, nec aliquam augue eleifend sit amet. Nam sed odio purus. Praesent gravida urna est, nec rhoncus metus rutrum vel. Donec eget velit non erat varius facilisis eu molestie leo. Vestibulum et ullamcorper justo. Sed tempor porttitor lorem vel aliquet. In condimentum, magna sit amet sodales gravida, nunc odio iaculis ante, sit amet cursus risus mi in justo. Morbi tempus ligula tempor, molestie augue ut, mollis lacus. Morbi nisl ligula, sollicitudin a faucibus eu, dictum nec est. Sed porta velit eu lorem sodales malesuada. Donec facilisis velit sem.</p>

  </div>


@endsection