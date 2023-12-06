<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Activity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $activity
 * @property string|null $datetime
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 */
	class Activity extends \Eloquent {}
}

namespace App{
/**
 * App\Adjustment
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $total_item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AdjustmentItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjustment whereUserId($value)
 */
	class Adjustment extends \Eloquent {}
}

namespace App{
/**
 * App\AdjustmentItem
 *
 * @property int $id
 * @property int $adjustment_id
 * @property int $product_id
 * @property int $adjustment
 * @property int $diff
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\InventoryTracking|null $trackings
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereAdjustment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereAdjustmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereDiff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjustmentItem whereUpdatedAt($value)
 */
	class AdjustmentItem extends \Eloquent {}
}

namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string|null $name
 * @property int $sort
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $enable
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Customer
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $password
 * @property string $phone
 * @property string $address
 * @property string|null $neighborhood
 * @property int $activation
 * @property int $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $comments
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer searchByKeyword($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereActivation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Expense
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $price
 * @property string|null $paym_methode
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense wherePaymMethode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUpdatedAt($value)
 */
	class Expense extends \Eloquent {}
}

namespace App{
/**
 * App\Homepage
 *
 * @property int $id
 * @property string $key
 * @property string|null $type
 * @property string $label_ar
 * @property string $value
 * @property string|null $language
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereLabelAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereValue($value)
 */
	class Homepage extends \Eloquent {}
}

namespace App{
/**
 * App\InventoryTracking
 *
 * @property-read \App\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $trackable
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryTracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryTracking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryTracking query()
 */
	class InventoryTracking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PrinterUser
 *
 * @property int $id
 * @property int|null $printer_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser wherePrinterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrinterUser whereUserId($value)
 */
	class PrinterUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation query()
 */
	class ProductTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $body
 * @property int $parent_id
 * @property string $language
 * @property int $is_delete
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 */
	class Page extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Query\Builder|Permission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Permission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Permission withoutTrashed()
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $barcode
 * @property string $name
 * @property string|null $description
 * @property string|null $titles
 * @property string $prices
 * @property int $quantity
 * @property int $is_delete
 * @property string $lang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $enable
 * @property string $tax_percentage
 * @property string|null $codes
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product searchByKeyword($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\Receiving
 *
 * @property-read mixed $total_amount
 * @property-read mixed $total_item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReceivingItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\Supplier|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receiving query()
 */
	class Receiving extends \Eloquent {}
}

namespace App{
/**
 * App\ReceivingItem
 *
 * @property-read mixed $subtotal
 * @property-read \App\InventoryTracking|null $trackings
 * @method static \Illuminate\Database\Eloquent\Builder|ReceivingItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReceivingItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReceivingItem query()
 */
	class ReceivingItem extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Sale
 *
 * @property int $id
 * @property int|null $table_id
 * @property int|null $customer_id
 * @property int|null $cashier_id
 * @property string|null $comments
 * @property string $receive_type
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $status 1:completed, 0 canceled
 * @property float $amount
 * @property float|null $discount
 * @property float|null $vat
 * @property float|null $delivery_cost
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $comment
 * @property string|null $type
 * @property string|null $payment_with
 * @property float|null $total_given
 * @property float $change
 * @property int|null $show_order
 * @property string|null $card_number
 * @property string $total_card
 * @property-read \App\User|null $cashier
 * @property-read \App\Customer|null $customer
 * @property-read mixed $invoice_no
 * @property-read mixed $subtotal
 * @property-read mixed $tax
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SaleItem[] $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCashierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDeliveryCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale wherePaymentWith($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereReceiveType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereShowOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTotalCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTotalGiven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereVat($value)
 */
	class Sale extends \Eloquent {}
}

namespace App{
/**
 * App\SaleItem
 *
 * @property int $id
 * @property int $sale_id
 * @property int $product_id
 * @property string $price
 * @property int $quantity
 * @property int $p_qty
 * @property string|null $size
 * @property string|null $codes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $subtotal
 * @property-read mixed $tax
 * @property-read \App\Product|null $product
 * @property-read \App\Sale|null $sale
 * @property-read \App\InventoryTracking|null $trackings
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem wherePQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleItem whereUpdatedAt($value)
 */
	class SaleItem extends \Eloquent {}
}

namespace App{
/**
 * App\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $label_en
 * @property string $label_ar
 * @property string $language
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLabelAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLabelEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App{
/**
 * App\Slider
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string|null $language
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App{
/**
 * App\Subscriber
 *
 * @property int $id
 * @property string $number
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereNumber($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App{
/**
 * App\Supplier
 *
 * @property int $id
 * @property string $name
 * @property string $company_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Query\Builder|Supplier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier searchByKeyword($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Supplier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Supplier withoutTrashed()
 */
	class Supplier extends \Eloquent {}
}

namespace App{
/**
 * App\Table
 *
 * @property int $id
 * @property string|null $table_name
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Table newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table query()
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereUpdatedAt($value)
 */
	class Table extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

