# CV project
Laravel project - not finished yet 

Here I use Laravel, MySQL, Vue, Redis

Here some tags to review it faster: 

API:

[/app/Http/Controllers/API/APIController.php - Custom API](/app/Http/Controllers/API/APIController.php)

[/app/Http/Controllers/API/FoodsAPI.php - API with resource](/app/Http/Controllers/API/FoodsAPI.php)


Controllers: 

[/app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php)

[/app/Http/Controllers/Room/FoodsController.php - Use mysql transaction](/app/Http/Controllers/Room/FoodsController.php)

[/app/Http/Controllers/HomeController.php](/app/Http/Controllers/HomeController.php)

[/app/Http/Controllers/Room/HomeController.php](/app/Http/Controllers/Room/HomeController.php)

Models: 

[/app/RoomsCart.php](/app/RoomsCart.php)

[/app/RoomsCartOrder.php](/app/RoomsCartOrder.php)

Routes:

[/routes/web.php](/routes/web.php)

[/routes/api.php](/routes/api.php)

Vue template: 

[/resources/js/components/room/FoodCart.vue](/resources/js/components/room/FoodCart.vue)

[/resources/js/components/room/Foods.vue](/resources/js/components/room/Foods.vue)

[/resources/js/components/room/ListFoods.vue](/resources/js/components/room/ListFoods.vue)

Blade template: 

[/resources/views/room/home.blade.php](/resources/views/room/home.blade.php)

[/resources/views/room/roomOptions.blade.php](/resources/views/room/roomOptions.blade.php)

Middleware:

[/app/Http/Middleware/UserRoles.php](/app/Http/Middleware/UserRoles.php)

Redis: 

[/app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php)

JQuery:

[/public/js/main.js](/public/js/main.js)

Resource: 

[/app/Http/Resources/FoodsResource.php](/app/Http/Resources/FoodsResource.php)

Migration: 

[/database/migrations/2019_01_06_114543_create_rooms_cart_orders.php](/database/migrations/2019_01_06_114543_create_rooms_cart_orders.php)

[/database/migrations/2019_01_04_182146_create_rooms_cart_table.php](/database/migrations/2019_01_04_182146_create_rooms_cart_table.php)

[/database/migrations/2014_10_12_000000_create_users_table.php](/database/migrations/2014_10_12_000000_create_users_table.php)

Seeds: 

[/database/seeds/FoodsTableSeeder.php - Seed with Factory](/database/seeds/FoodsTableSeeder.php)

[/database/seeds/RoomInfoTableSeeder.php](/database/seeds/RoomInfoTableSeeder.php)

Factories:

[/database/factories/FoodsFactory.php](/database/factories/FoodsFactory.php)

Events: 

[/app/Events/OrderFoods.php](/app/Events/OrderFoods.php)

Listeners: 

[/app/Listeners/OrderFoodsEvent.php](/app/Listeners/OrderFoodsEvent.php)


