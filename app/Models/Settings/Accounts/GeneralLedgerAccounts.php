<?php

namespace App\Models\Settings\Accounts;

use Auth;
use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class GeneralLedgerAccounts extends Model
{

    /**
     * Fillable field for mass assigments from the form.
     * @var Array
     */
    protected $fillable = [
        'name',
        'balance',
        'identifier',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeAssets()
    {
        return $this->where('parent_identifier', 'A')->get();
    }

    public function scopeEquity()
    {
        return $this->where('parent_identifier', 'E')->get();
    }

    public function scopeLiabilities()
    {
        return $this->where('parent_identifier', 'L')->get();
    }

    public function scopeCapital()
    {
        return $this->where('parent_identifier', 'C')->get();
    }

    public function scopeExpenses()
    {
        return $this->where('parent_identifier', 'X')->get();
    }

    /**
     * Load all child accounts under the specified 
     * identifier type. 
     * @param  String $type the account identifier type
     * @return Collection      Collection of all the child accounts and asset
     * accounts if not type identifier is passed in.
     */
    public static function loadType($type)
    {
        switch ($type) {
            case 'A':
                return self::assets();
                break;
            case 'E':
                return self::equity();
                break;
            case 'L':
                return self::liabilities();
                break;
            case 'C':
                return self::capital();
                break;
            case 'X':
                return self::expenses();
                break;
            default:
                return self::assets();
                break;
        }
    }

    /**
     * Create and returns a new instance of a gla.
     * @param  Array(assoc) $params fillable request params. 
     * @return GeneralLedgerAccounts        the gla object stubbed.
     */
    public static function make($params)
    {
        $new_account               = new GeneralLedgerAccounts($params);
        $new_account->school_id    = Auth::user()->school_id;
        $new_account->slug         = slugify($new_account->name);
        $new_account->is_deletable = true;
        return $new_account;
    }

    /**
     * Get the immediate pareant account of this gla.
     * pleae not that this will through and error if the parent id
     * is 0 or doesnt exist.
     * @return GeneralLedgerAccounts the parent accout  retrieved.
     */
    public function parent()
    {
        return GeneralLedgerAccounts::find($this->parent_id);
    }

    public function increaseBalance($amount)
    {
        $this->balance += $amount;
        $this->save();
    }
    public function decreaseBalance($amount)
    {
        $this->balance -= $amount;
        $this->save();
    }
}
