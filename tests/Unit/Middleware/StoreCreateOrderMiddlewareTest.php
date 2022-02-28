<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\StoreCreateOrderMiddleware;
use App\Models\Status;
use App\Models\Store\Store;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;


class StoreCreateOrderMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    protected Request $request;
    protected $store;
    protected StoreCreateOrderMiddleware $middleware;

    public function setUp(): void
    {
        parent::setUp();

        $this->middleware = new StoreCreateOrderMiddleware();

        $this->request = (new Request())->merge([
            'message' => 'Test Middleware Message'
        ]);

        $this->store = Store::factory()->create();
    }

    public function testAuthorizationNextRequest(): void
    {
        $this->request->headers->set('Authorization', $this->store->api_key);

        $this->middleware->handle($this->request, function ($req) {
            $this->assertEquals($this->store->api_key, $req->header('Authorization'));
            $this->assertEquals('Test Middleware Message', $req->message);
        });
    }

    public function testNotSendAuthorization(): void
    {
        $response = $this->middleware->handle($this->request, function () {});

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertArrayHasKey('message', $response->getOriginalContent());
        $this->assertEquals('Unauthorized. Your Authorization is not valid.', $response->getOriginalContent()['message']);
    }

    public function testStoreStatusIsBlocked(): void
    {
        $this->changeStatusStore();
        $this->request->headers->set('Authorization', $this->store->api_key);

        $response = $this->middleware->handle($this->request, function () {});

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertArrayHasKey('message', $response->getOriginalContent());
        $this->assertEquals('Store is not authorized to perform this action.', $response->getOriginalContent()['message']);
    }

    private function changeStatusStore(): void
    {
        $this->store->status_id = Status::BLOCKED;
        $this->store->save();
    }
}
