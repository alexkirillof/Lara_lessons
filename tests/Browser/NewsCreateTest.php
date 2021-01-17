<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('заголовок')
                ->assertSee('Description')
                ->type('name', '')
                ->press('Save')
                ->assertSee('Поле Заголовок обязательно для заполнения')
                ->press('Save')
                ->assertSee('Количество символов в поле Заголовок должно быть не меньше 10.');
        });
    }
}
