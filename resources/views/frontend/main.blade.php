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
  
    
  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
        <!-- Chiffres clés -->
        <div class="col-md-6 pr-5">
          <div class="block-48">
            <span class="block-48-text-1">Nous avons redistribué</span>
            <div class="block-48-counter ftco-number" data-number="50000">0</div>
            <span class="block-48-text-1 mb-4 d-block">Repas à travers 50 associations</span>
            <p class="mb-0"><a href="#" class="btn btn-white px-3 py-2">Voir notre Impact</a></p>
          </div>
        </div>
  
        <!-- Texte de présentation -->
        <div class="col-md-6 welcome-text">
          <h2 class="display-4 mb-3">Qui Sommes-Nous ?</h2>
          <p class="lead">RescueFood est une plateforme dédiée à la récupération des excédents alimentaires auprès des restaurants et commerçants, afin de les redistribuer aux associations et organisations caritatives.</p>
          <p class="mb-4">Nous travaillons chaque jour pour lutter contre le gaspillage alimentaire tout en aidant des milliers de familles dans le besoin. Rejoignez-nous pour créer un impact durable.</p>
          <p class="mb-0"><a href="#" class="btn btn-primary px-3 py-2">En savoir plus</a></p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="site-section border-top">
    <div class="container">
      <div class="row">
  
        <!-- Notre Mission -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-bulb"></span></div>
            <div class="media-body">
              <h3 class="heading">Notre Mission</h3>
              <p>Chez RescueFood, nous luttons contre le gaspillage alimentaire en collectant les excédents pour les redistribuer aux communautés dans le besoin, tout en promouvant la solidarité et l'entraide.</p>
              <p><a href="#" class="link-underline">En savoir plus</a></p>
            </div>
          </div>     
        </div>
  
        <!-- Faire un Don -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-cash"></span></div>
            <div class="media-body">
              <h3 class="heading">Faire un Don</h3>
              <p>Aidez-nous à étendre notre portée en faisant un don alimentaire ou financier. Ensemble, nous pouvons nourrir des milliers de familles et bâtir un monde plus solidaire.</p>
              <p><a href="#" class="link-underline">Faire un don</a></p>
            </div>
          </div>  
        </div>
  
        <!-- Besoin de bénévoles -->
        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-contacts"></span></div>
            <div class="media-body">
              <h3 class="heading">Nous avons besoin de bénévoles</h3>
              <p>Rejoignez notre réseau de bénévoles pour aider à collecter, trier et distribuer des produits alimentaires aux personnes dans le besoin.</p>
              <p><a href="#" class="link-underline">Devenir bénévole</a></p>
            </div>
          </div> 
        </div>
  
      </div>
    </div>
  </div>
  
  
    
  
  <div class="site-section fund-raisers bg-light">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-md-8 text-center">
          <h2>Dernières Collectes de Fonds</h2>
          <p class="lead">Découvrez les initiatives récentes pour soutenir les communautés en difficulté. Votre don peut faire une grande différence.</p>
          <p><a href="#" class="link-underline">Voir toutes les collectes</a></p>
        </div>
      </div>
    </div>
  
    <div class="container-fluid">
  
      <div class="col-md-12 block-11">
        <div class="nonloop-block-11 owl-carousel">
  
         
  
         
  
          @foreach ($products as $product)
          <x-product-card :product="$product" />
  
          @endforeach
  
         
  
          <!-- Ajoutez d'autres items ici -->
  
        </div>
      </div>
    </div>
  </div> <!-- .section -->
  
  
  
  <div class="site-section fund-raisers">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-md-8 text-center">
          <h2>Dernières Dons</h2>
          <p class="lead">Voici quelques exemples rapides pour mettre en valeur les dons récents.</p>
          <p class="mb-5"><a href="#" class="link-underline">Voir tous les dons</a></p>
        </div>
      </div>
  
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_1.jpg')}}" alt="Jorge Smith" class="img-fluid">
            <div class="donate-info">
              <h2>Jorge Smith</h2>
              <span class="time d-block mb-3">Donné à l'instant</span>
              <p>Donné <span class="text-success">$252</span> <br> <em>pour</em> 
                <a href="#" class="link-underline fundraise-item">L'eau est la vie. Eau potable en milieu urbain</a>
              </p>
            </div>
          </div>    
        </div>
  
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_2.jpg')}}" alt="Christine Charles" class="img-fluid">
            <div class="donate-info">
              <h2>Christine Charles</h2>
              <span class="time d-block mb-3">Donné il y a 1 heure</span>
              <p>Donné <span class="text-success">$400</span> <br> <em>pour</em> 
                <a href="#" class="link-underline fundraise-item">Les enfants ont besoin d'éducation</a>
              </p>
            </div>
          </div>    
        </div>
  
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_3.jpg')}}" alt="Albert Sluyter" class="img-fluid">
            <div class="donate-info">
              <h2>Albert Sluyter</h2>
              <span class="time d-block mb-3">Donné il y a 4 heures</span>
              <p>Donné <span class="text-success">$1,200</span> <br> <em>pour</em> 
                <a href="#" class="link-underline fundraise-item">Besoin d'abri pour les enfants en Afrique</a>
              </p>
            </div>
          </div>    
        </div>
  
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="{{ asset('import/images/person_4.jpg')}}" alt="Andrew Holloway" class="img-fluid">
            <div class="donate-info">
              <h2>Andrew Holloway</h2>
              <span class="time d-block mb-3">Donné il y a 9 heures</span>
              <p>Donné <span class="text-success">$100</span> <br> <em>pour</em> 
                <a href="#" class="link-underline fundraise-item">L'eau est la vie. Eau potable en milieu urbain</a>
              </p>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div> <!-- .section -->
  
  
  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_3.jpg');">
    
    <div class="container">
      <div class="row">
  
        <div class="col-md-6">
          <img src="{{ asset('import/images/bg_3.jpg')}}" alt="Image illustrative" class="img-fluid">
        </div>
  
        <div class="col-md-6 pl-md-5">
          <span class="featured-text d-block mb-3">Histoires de Succès</span>
          <h2>L'eau est la vie. Nous fournissons avec succès de l'eau potable en Asie du Sud-Est</h2>
          <p class="mb-3">Loin derrière les montagnes des mots, loin des pays de Vokalia et Consonantia, vivent les textes aveugles.</p>
          <span class="fund-raised d-block mb-5">Nous avons collecté 100 000 $</span>
  
          <p><a href="#" class="btn btn-success btn-hover-white py-3 px-5">Lire l'Intégralité de l'Histoire</a></p>
        </div>
        
      </div>
    </div>
  
  </div> <!-- .featured-donate -->
  
  
  <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <h2>Dernières Nouvelles</h2>
        </div>
      </div>
  
      <div class="row">
        @foreach ($offres as $offre)
        <x-offre-card :offre="$offre" />
        @endforeach
        
       
      </div>
    </div>
  </div> <!-- .section -->
  
  
  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_2.jpg');">
    
    <div class="container">
      <div class="row">
  
        <div class="col-md-6 mb-5 mb-md-0">
          <img src="{{ asset('import/images/bg_2.jpg')}}" alt="Image illustrative" class="img-fluid">
        </div>
  
        <div class="col-md-6 pl-md-5">
  
          <div class="form-volunteer">
            
            <h2>Devenez Bénévole Aujourd'hui</h2>
            <form action="#" method="post">
              <div class="form-group">
                <input type="text" class="form-control py-2" id="name" placeholder="Entrez votre nom">
              </div>
              <div class="form-group">
                <input type="text" class="form-control py-2" id="email" placeholder="Entrez votre email">
              </div>
              <div class="form-group">
                <textarea name="v_message" id="" cols="30" rows="3" class="form-control py-2" placeholder="Écrivez votre message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-white px-5 py-2" value="Envoyer">
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  
  </div> <!-- .featured-donate -->
  @endsection
  