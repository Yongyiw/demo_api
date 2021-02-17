<?php

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\MessageRequest;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MessageController extends Controller
{
    const ANONYMOUS_USER_ID = 0;

    public function add(MessageRequest $request)
    {
        $message = new Message([
            'text' => $request->get('text'),
            'created_by' => self::ANONYMOUS_USER_ID
        ]);

        if(!$message->save()) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok'
        ], 201);
    }

    public function getAll()
    {
        $messages = Message::all()->toArray();

        return response()->json([
            'status' => 'ok',
            'payload' => $messages
        ], 201);
    }

    public function check(MessageRequest $request)
    {
        $text = $request->get('text');
        return response()->json([
            'status' => 'ok',
            'result' => $this->isPanlindrome($text)
        ], 201);

    }

    /**
     * @param string $text
     * @return bool
     */
    private function isPanlindrome(string $text)
    {
        if (strlen($text) <= 1) {
            return true;
        }

        $charSet = str_split($text, 1);
        foreach ($charSet as $index => $char) {
            if ($index > strlen($text)/2) {
                break;
            }

            if ($char !== $text[strlen($text) - $index - 1]) {
                return false;
            }
        }
        return true;
    }

}
