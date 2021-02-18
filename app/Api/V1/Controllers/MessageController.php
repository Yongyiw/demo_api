<?php

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\MessageRequest;
use App\Api\V1\Requests\UpdateMessageRequest;
use App\Api\V1\Requests\GetMessageRequest;
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

        // Check isPanlindrome;
        $result = $this->isPanlindrome($message);
        $message->isPanlidrome = $result;

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
        ], 200);
    }

    public function getById(GetMessageRequest $request)
    {
        //@todo
    }


    public function delete(MessageRequest $request)
    {
        $text = $request->get('text');
        $message = Message::where('text', 'like', $text)
                        ->first();

        if (empty($message)) {
            return response()->json([
                'status' => 'ok'
            ], 200);
        }

        if (!$message->delete()) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok'
        ], 200);
    }

    public function update(UpdateMessageRequest $request)
    {
        $message = Message::where('text', 'like', $request->get('text'))
                    ->first();

        if (empty($message)) {
            return response()->json([
                'status' => 'ok'
            ], 200);
        }

        $message->text = $request->get('newText');

        if(!$message->save()) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok'
        ], 200);
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
