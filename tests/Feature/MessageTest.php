<?php

namespace Tests\Feature;

use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_get_messages()
    {
        $response = $this->get('/api/message/list');
        $response->assertStatus(200);
    }

    public function test_add_message()
    {
        $response = $this->post('/api/message/add', [
           'text' => 'unitTestText'
        ]);

        $response->assertStatus(201);
    }

    public function test_delete_message()
    {
        $response = $this->delete('/api/message/delete', [
            'text' => 'unitTestText'
        ]);

        $response->assertStatus(200);
    }


    /**
     * @dataProvider panlindromeSet
     * @param $string
     * @param $boolValue
     */
    public function test_check_message($string, $boolValue)
    {
        $response = $this->post('/api/message/check', [
                'text' => $string
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                    "status" => 'ok',
                    "result" => $boolValue
                ]);
    }

    public function panlindromeSet()
    {
        return [
            ['', true],
            ['a', true],
            ['b', true],
            ['===', true],
            ['ababa', true],
            ['a,c,a', true],
            ['asdkfj;lasdjflasjdlfadsfl', false],
            ['whatisthattahtsitahw', true],
            ['sator arepo tenet opera rotas', true],
            [121, true],
        ];
    }

}
