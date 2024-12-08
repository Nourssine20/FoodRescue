@props(['product'])


<div class="card fundraise-item">
  <a href="#"><img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="Aide alimentaire pour réfugiés"></a>
  <div class="card-body">
    <h3 class="card-title"><a href="#">{{ $product->name }}</a></h3>
    <p class="card-text">{{ $product->description }}</p>
    <span class="donation-time mb-3 d-block">{{ $product->created_at->diffForHumans() }}</span>
    <div class="progress custom-progress-success">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <span class="fund-raised d-block">{{ number_format($product->price, 2) }} $</span>
    <form action="{{ route('panier.add', $product->id) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-success">Ajouter au Panier</button>
  </form>
  </div>
</div>