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
    
        <h1 class="mb-4">Votre Panier</h1>
        @if($products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php
              $totalPrice = 0; 
          @endphp
                @foreach($products as $cartItem)
                @php
                
                $totalPrice += $cartItem->product->price * $cartItem->quantity;
            @endphp
                    <tr>
                        <td>{{ $cartItem->product->name }}</td>
                        <td>{{ $cartItem->product->price }} €</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>
                            <form action="{{ route('panier.remove', $cartItem->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Retirer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: {{ number_format($totalPrice, 2) }} €</h3>
        <a href="{{ route('payment.create') . '?amount=' . $totalPrice }}" class="btn btn-primary">Passer à la caisse</a>
    @else
        <p>Votre panier est vide.</p>
    @endif

    
    
@endsection