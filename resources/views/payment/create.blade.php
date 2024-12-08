@extends('frontend.homepage')
@section('content')
<div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31">
      <div class="block-30 block-30-sm item" style="background-image: url('import/images/nourit.jpeg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Réduisez le Gaspillage Alimentaire, Aidez Ceux Qui En Ont Besoin.</h2>
              <p style="display: inline-block;"><a href="https://vimeo.com/channels/staffpicks/93951774" data-fancybox class="ftco-play-video d-flex"><span class="play-icon-wrap align-self-center mr-4"><span class="ion-ios-play"></span></span> <span class="align-self-center">Regardez la Vidéo</span></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <h1>Paiement</h1>
    <form action="{{ route('payment.charge') }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="amount" value="{{ $totalAmount }}">
        <div class="form-group">
            <label for="card-element">Carte de crédit ou de débit</label>
            <div id="card-element"></div>
            <div id="card-errors" role="alert"></div>
        </div>
        <button class="btn btn-primary" type="submit">Payer</button>
    </form>


<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    cardElement.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    document.getElementById('payment-form').addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
</script>
@endsection