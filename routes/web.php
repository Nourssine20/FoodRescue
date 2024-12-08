<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\BenificaireController;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\SponsorshipController;

use App\Http\Controllers\CollecteController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Main Page Route
Route::get('/', [Analytics::class, 'index'])->middleware(['auth', 'verified','role:admin'])->name('dashboard-analytics');


// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
//donator Routes
Route::get('/donatorform', [DonatorController::class, 'create'])->name('donators.create');
Route::post('/donatorsform', [DonatorController::class, 'store'])->name('donators.store');
Route::get('/donatorslist', [DonatorController::class, 'index'])->name('donators.index');
Route::put('/donatorslist', [DonatorController::class, 'edit'])->name('donators.edit');
Route::delete('/donatorslist', [DonatorController::class, 'destroy'])->name('donators.destroy');


Route::get('/benificaires', [BenificaireController::class, 'index'])->name('benificaires.index');
Route::get('/benificaires/create', [BenificaireController::class, 'create'])->name('benificaires.create'); 
Route::post('/benificaires', [BenificaireController::class, 'store'])->name('benificaires.store'); 
Route::get('/benificaires/{id}', [BenificaireController::class, 'show'])->name('benificaires.show');
Route::get('/benificaires/{id}/edit', [BenificaireController::class, 'edit'])->name('benificaires.edit');
Route::put('/benificaires/{id}', [BenificaireController::class, 'update'])->name('benificaires.update'); 
Route::delete('/benificaires/{id}', [BenificaireController::class, 'destroy'])->name('benificaires.destroy'); 

Route::delete('/donatorslist', [DonatorController::class, 'destroy'])->name('donators.destroy');
Route::resource('partenaires', PartenaireController::class);
Route::resource('sponsorships', SponsorshipController::class);

Route::delete('/donatorslist/{id}', [DonatorController::class, 'destroy'])->name('donators.destroy');

Route::resource('collectes', CollecteController::class);
Route::resource('livraisons', LivraisonController::class);

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified','role:client'])->name('home');
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index'); 
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create'); 
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store'); 
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show'); 
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); 
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update'); 
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index'); 
    Route::get('/create', [ProductController::class, 'create'])->name('products.create'); 
    Route::post('/', [ProductController::class, 'store'])->name('products.store'); 
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show'); 
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update'); 
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); 
});
Route::post('/set-locale', function (Request $request) {
    $request->session()->put('locale', $request->locale);
    return redirect()->back();
})->name('setLocale');


Route::get('demandes', [DemandeController::class, 'index'])->name('demandes.index'); // Liste des demandes
Route::get('demandes/create', [DemandeController::class, 'create'])->name('demandes.create'); // Formulaire d'ajout
Route::post('demandes', [DemandeController::class, 'store'])->name('demandes.store'); // Enregistrer une demande
Route::get('demandes/{demande}', [DemandeController::class, 'show'])->name('demandes.show'); // Détails d'une demande
Route::get('demandes/{demande}/edit', [DemandeController::class, 'edit'])->name('demandes.edit'); // Formulaire de modification
Route::put('demandes/{demande}', [DemandeController::class, 'update'])->name('demandes.update'); // Mettre à jour une demande
Route::delete('demandes/{demande}', [DemandeController::class, 'destroy'])->name('demandes.destroy'); // Supprimer une demande
//


Route::resource('transporteurs', TransporteurController::class);
Route::resource('vehicules', VehiculeController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified', 'role:client'])->group(function () {
    Route::get('/panier', [CartController::class, 'show'])->name('panier');
    Route::post('/panier/add/{product}', [CartController::class, 'add'])->name('panier.add');
    Route::delete('/panier/remove/{id}', [CartController::class, 'remove'])->name('panier.remove');
});
Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/charge', [PaymentController::class, 'charge'])->name('payment.charge');
Route::prefix('offres')->middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::get('/', [OffreController::class, 'index'])->name('offres.index'); 
    Route::get('/create', [OffreController::class, 'create'])->name('offres.create'); 
    Route::post('/', [OffreController::class, 'store'])->name('offres.store'); 
    Route::get('/{id}', [OffreController::class, 'show'])->name('offres.show'); 
    Route::get('/{id}/edit', [OffreController::class, 'edit'])->name('offres.edit'); 
    Route::put('/{id}', [OffreController::class, 'update'])->name('offres.update'); 
    Route::delete('/{id}', [OffreController::class, 'destroy'])->name('offres.destroy');
});
Route::post('review-store', [OffreController::class,'reviewstore'])->name('review.store');


require __DIR__.'/auth.php';
