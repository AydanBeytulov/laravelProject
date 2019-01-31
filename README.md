# CV project
Laravel project - not finished yet (in progress).

My LinkedIn profile: https://www.linkedin.com/in/aydanbeytulov/

__Here you can find better Laravel code: https://github.com/AydanBeytulov/MoviesStream__

Hey! I start to make hotel room managment system. I'll connect it with atmel microcontrollers in future. 
It's not much code but I hope it will be enough for example. For now I use Laravel, MySQL, Vue, Redis. 
Next step is to add socket.io.


Here some tags to review it faster: 

__API:__

[/app/Http/Controllers/API/APIController.php - Custom API / AUTH with api token](/app/Http/Controllers/API/APIController.php)

[/app/Http/Controllers/API/FoodsAPI.php - API with resource / AUTH with api token](/app/Http/Controllers/API/FoodsAPI.php)


__Controllers:__

[/app/Http/Controllers/Controller.php - Redis](/app/Http/Controllers/Controller.php)

[/app/Http/Controllers/Room/EventsController.php](/app/Http/Controllers/Room/EventsController.php)

[/app/Http/Controllers/Room/FoodsController.php - Use mysql transaction](/app/Http/Controllers/Room/FoodsController.php)

[/app/Http/Controllers/Room/HomeController.php](/app/Http/Controllers/Room/HomeController.php)

__Models:__ 

[/app/RoomsCart.php](/app/RoomsCart.php)

[/app/RoomsCartOrder.php](/app/RoomsCartOrder.php)

__Routes:__

[/routes/web.php](/routes/web.php)

[/routes/api.php](/routes/api.php)

__Vue template:__ 

[/resources/js/components/room/FoodCart.vue](/resources/js/components/room/FoodCart.vue)

[/resources/js/components/room/Foods.vue](/resources/js/components/room/Foods.vue)

[/resources/js/components/room/ListFoods.vue](/resources/js/components/room/ListFoods.vue)

__Blade template:__ 

[/resources/views/room/home.blade.php](/resources/views/room/home.blade.php)

[/resources/views/room/roomOptions.blade.php](/resources/views/room/roomOptions.blade.php)

__Middleware:__

[/app/Http/Middleware/UserRoles.php](/app/Http/Middleware/UserRoles.php)

__Redis:__

[/app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php)

__JQuery:__

[/public/js/main.js](/public/js/main.js)

__Resource:__ 

[/app/Http/Resources/FoodsResource.php](/app/Http/Resources/FoodsResource.php)

__Migration:__ 

[/database/migrations/2019_01_06_114543_create_rooms_cart_orders.php](/database/migrations/2019_01_06_114543_create_rooms_cart_orders.php)

[/database/migrations/2019_01_04_182146_create_rooms_cart_table.php](/database/migrations/2019_01_04_182146_create_rooms_cart_table.php)

[/database/migrations/2014_10_12_000000_create_users_table.php](/database/migrations/2014_10_12_000000_create_users_table.php)

__Seeds:__ 

[/database/seeds/FoodsTableSeeder.php - Seed with Factory](/database/seeds/FoodsTableSeeder.php)

[/database/seeds/RoomInfoTableSeeder.php](/database/seeds/RoomInfoTableSeeder.php)

__Factories:__

[/database/factories/EventsFactory.php](/database/factories/EventsFactory.php)

[/database/factories/FoodsFactory.php](/database/factories/FoodsFactory.php)

__Events:__ 

[/app/Events/OrderFoods.php](/app/Events/OrderFoods.php)

__Listeners:__ 

[/app/Listeners/OrderFoodsEvent.php](/app/Listeners/OrderFoodsEvent.php)
