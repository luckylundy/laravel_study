<?php

test('check database User create', function() {
    // ユーザーのダミーデータを作成する
    $user = App\Models\User::factory()->create();
    // $userがNullでないことを確認する
    expect($user)->not->toBeNull();
});

function createPerson()
{
    $ob = new App\Models\User;
    $ob->name = 'alice';
    $ob->email = 'alice@wonderland';
    $ob->password = 'wonderland';
    $ob->save();
    return $ob;
}

test('check database Person find', function() {
    $ob = createPerson();
    $res = App\Models\User::where('name', 'alice')->first();
    expect($res)->not->toBeNull();
});

test('check database Person create', function() {
    $p = App\Models\Person::factory()->create();
    expect($p)->not->toBeNull();
});

test('check database Person create and find', function() {
    // Personクラスのダミーインスタンスを作成
    $p = App\Models\Person::factory()->create();
    // name属性が$pのnameと一致するデータを取得
    $res = App\Models\Person::where('name', $p->name)->first();
    // ダミーデータがNullにならないか確認
    expect($res)->not()->toBeNull();
});

test('check database Person find all', function() {
    $arr = [
        App\Models\Person::factory()->create(),
        App\Models\Person::factory()->create(),
        App\Models\Person::factory()->create(),
    ];
    $res = App\Models\Person::all();
    expect($res->count())->toEqual(count($arr));
});

test('authenticated user can access', function() {
    // ダミーユーザーを作成
    $user = App\Models\User::factory()->create();
    // ダミーユーザーをログイン状態にする
    $this->actingAs($user);
    // 認証が必要なページにアクセス
    $response = $this->get('/');
    // 結果が200 OKになっていることを確認
    $response->assertStatus(200);
});