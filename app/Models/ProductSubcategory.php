namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;

    protected $table = 'adventureworks_product_subcategories';
    protected $primaryKey = 'ProductSubcategoryKey';
    public $timestamps = false;

    protected $fillable = [
        'ProductSubcategoryKey',
        'SubcategoryName',
        'ProductCategoryKey',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'ProductCategoryKey', 'ProductCategoryKey');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'ProductSubcategoryKey', 'ProductSubcategoryKey');
    }
}