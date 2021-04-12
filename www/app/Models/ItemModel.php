<?php 
namespace App\Models;
use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'epico_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category', 'cost_price', 'unit_price', 'pic_filename'];
}