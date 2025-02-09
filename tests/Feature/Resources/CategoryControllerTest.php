<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use App\Models\Article;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestStore;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;

class CategoryControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestUpdate, TestRestore, TestForceDelete;

    protected $storeData     = [
        'name'        => 'Store',
        'slug'        => 'store',
        'keywords'    => 'keywords',
        'description' => 'description',
        'sort'        => 2,
        'pid'         => 1,
    ];
    protected $updateData = [
        'name' => 'Updated Name',
    ];

    public function testDestroy()
    {
        Article::where('category_id', $this->destroyId)->delete();

        $this->assertResponse(
            $this->delete(route($this->getRoute() . '.destroy', $this->destroyId))
        );
    }
}
