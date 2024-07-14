namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'adventureworks_product_categories';
    protected $primaryKey = 'ProductCategoryKey';
    public $timestamps = false;

    protected $fillable = [
        'ProductCategoryKey',
        'CategoryName',
    ];

    public function subcategories()
    {
        return $this->hasMany(ProductSubcategory::class, 'ProductCategoryKey', 'ProductCategoryKey');
    }
}
