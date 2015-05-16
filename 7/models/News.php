<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 13.05.2015
 * Time: 18:40
 */

namespace App\Models;
use App\Classes\AbstractModel;

/**
 * Class NewsModel
 * @property $id
 * @property $title
 * @property $text
 * @property $add_date
 */
class News extends AbstractModel {

    protected static $table = 'news5';

}