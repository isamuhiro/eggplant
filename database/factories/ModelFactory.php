<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'daniela',
        'email' => 'daniela@verduranet.com.br',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Drivers::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'name' => $faker->firstNameMale, 
        'email' => "admin@admin.com", 
        'password' => bcrypt("secret"), 
        'cpf' => $faker->cpf
    ];
});

$factory->define(App\Os::class, function (Faker\Generator $faker) {

    return [
        'number'  => '001',
        'status'  => '1',
        'total'  => 2.22,
        'managers_id'  => 1,
        'stores_id'  => 1,
        'drivers_id' => 1
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {

    return [
        'os'  => '1',
        'amount'  => 1,
        'corte'  => '0',
        'os_id'  => 1,
        'products_id'  => 1
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    static $password;
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\Company($faker));
    
    return [
        'cpf' => $faker->cpf,
        'cnpj' => $faker->cnpj,
        'razao_social' => $faker->company,
        'inscricao_estadual' => $faker->company,
        'name' => $faker->name,
        'email' => "teste@teste.com.br",
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'ativo' => 1
    ];
});

$factory->define(\App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
        'weight' => $faker->numberBetween(1, 10),
        'amount' => $faker->numberBetween(1, 10),
    ];
});

$factory->define(\App\Store::class, function (Faker\Generator $faker) {
  $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
  $faker->addProvider(new Faker\Provider\pt_BR\Internet($faker));
  $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
  $faker->addProvider(new Faker\Provider\pt_BR\Company($faker));
  
  return [
        'company_name' => $faker->company,
        'state' => $faker->stateAbbr,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->phoneNumber,        
        'city' => $faker->cityPrefix.' '. $faker->citySuffix,
        'country' => 'Brazil',
        'address' => $faker->streetAddress,
        'neighborhood' => 'Bom jesus',        
        'cep' => $faker->postcode,        
        'email' => $faker->email    
    ];
});

$factory->define(\App\Manager::class, function (Faker\Generator $faker) {
    static $password;
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));

    return [
        'name' => $faker->name,
        'email' => $faker->freeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'cpf' => '036.444.555-96',
        'clients_id' => 1,
    ];
});

$factory->define(App\ProductClient::class, function (Faker\Generator $faker) {
    
    return [
        'clients_id' => 1,
        'products_id' => 1
    ];
});
