<?php

namespace App\Policies;

use App\User;
use App\Models\SalesInvoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalesInvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sales invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SalesInvoice  $salesInvoice
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->type === 'admin'
            OR $user->type === 'manager'
            OR $user->type === 'salesperson';
    }

    /**
     * Determine whether the user can create sales invoices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type === 'admin'
            OR $user->type === 'manager'
            OR $user->type === 'salesperson';
    }

    /**
     * Determine whether the user can update the sales invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SalesInvoice  $salesInvoice
     * @return mixed
     */
    public function update(User $user, SalesInvoice $salesInvoice)
    {
        if ($user->type === 'admin') return true;
        if (($user->type === 'manager' OR $user->type === 'salesperson') 
            AND $user->id === $product->user_id) return true;
        return false;
    }

    /**
     * Determine whether the user can delete the sales invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SalesInvoice  $salesInvoice
     * @return mixed
     */
    public function delete(User $user, SalesInvoice $salesInvoice)
    {
        //
    }

    /**
     * Determine whether the user can restore the sales invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SalesInvoice  $salesInvoice
     * @return mixed
     */
    public function restore(User $user, SalesInvoice $salesInvoice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the sales invoice.
     *
     * @param  \App\User  $user
     * @param  \App\Models\SalesInvoice  $salesInvoice
     * @return mixed
     */
    public function forceDelete(User $user, SalesInvoice $salesInvoice)
    {
        //
    }
}
