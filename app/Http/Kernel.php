

protected $routeMiddleware = [
    // ...
    'auth.session' => \App\Http\Middleware\AuthSession::class,
];
