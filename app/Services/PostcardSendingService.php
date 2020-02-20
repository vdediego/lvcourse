<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class PostcardSendingService
{
    /** @var int  */
    private $width;
    /** @var int  */
    private $height;
    /** @var string  */
    private $from;

    /**
     * PostcardSendingService constructor.
     * @param int $width
     * @param int $height
     * @param string $from
     */
    public function __construct(int $width, int $height, string $from)
    {
        $this->width = $width;
        $this->height = $height;
        $this->from = $from;
    }

    /**
     * @param string $message
     * @param string $emailAddress
     * @return string
     */
    public function greetings(string $message, string $emailAddress)
    {
        Mail::raw($message, function ($message) use ($emailAddress) {
            $message->to($emailAddress);
        });

        return 'Postcard has been send! Enjoy!';
    }
}
