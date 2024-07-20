

// namespace App\Livewire\Products;

// use App\Models\Inventory;
// use Livewire\Attributes\Url;
// use Livewire\Component;

// class Products extends Component

// {
//     #[Url(keep: true)]
//     public $filter  = '';
//     protected $queryString = [
//         'filter' => ['except' => '']
//     ];

//     public function getProducts(){

//         return Inventory::latest()->filter([
//             'search' => $this->filter
//         ])->paginate();
//     }

//     public function render()
//     {
//         // dd($this->filter);
//         $allProducts = $this->getProducts();
//         return view('livewire.products.products', ['allProducts' => $allProducts]);
//     }
// }
