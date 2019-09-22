<?php

namespace App\Policies;

use App\User;
use App\Models\PurchaseInvoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseInvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchase invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseInvoice  $purchaseInvoice
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->type === 'admin'
            OR $user->type === 'manager'
            OR $user->type === 'salesperson';
    }

    /**
     * Determine whether the user can create purchase invoices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type === 'admin'
            OR $user->type === 'manager';
    }

    /**
     * Determine whether the user can update the purchase invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseInvoice  $purchaseInvoice
     * @return mixed
     */
    public function update(User $user, PurchaseInvoice $purchaseInvoice)
    {
        if ($user->type === 'admin') return true;
        if (($user->type === 'manager') AND ($user->id === $product->user_id)) return true;
        return false;
    }

    /**
     * Determine whether the user can delete the purchase invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseInvoice  $purchaseInvoice
     * @return mixed
     */
    public function delete(User $user, PurchaseInvoice $purchaseInvoice)
    {
        //
    }

    /**
     * Determine whether the user can restore the purchase invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseInvoice  $purchaseInvoice
     * @return mixed
     */
    public function restore(User $user, PurchaseInvoice $purchaseInvoice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the purchase invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseInvoice  $purchaseInvoice
     * @return mixed
     */
    public function forceDelete(User $user, PurchaseInvoice $purchaseInvoice)
    {
        //
    }
}
