<?php

namespace App\Observers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        
        $user = Auth::user();//когда создана модель
        $now = Carbon::now()->toDateTimeString();
        Log::info("{$now}: {$user->name}, CATEGORY_CREATED {$category->name}");
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        dump($category->getOriginal('description'));// посмотреть предыдущее именно описания(т.к. его обновляли) обновленной категории
        dd($category->getDirty());//если сущ.модель была отредактирована - обновлена
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        $user = Auth::user();
        $now = Carbon::now()->toDateTimeString();
        Log::info("{$now}: {$user->name}, CATEGORY_DELETED {$category->name}");//удаление конечно же)))
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //полное удаление из БД
    }
}
