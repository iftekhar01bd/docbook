<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {

        $botman = app('botman');
        
        $botman->hears('{message}', function ($botman, $message) {

            if ($message == "hi"or $message=='hello' or $message== 'HI' or $message=='HELLO' ) {
                $botman->reply("Hello");
                $botman->reply("Welcome");
            } 
               
            elseif($message=='cough' or $message=='high temperature' or $message=='sick ' or $message=='corona'){

                $botman->reply("Temperature reading? ");

            }

            elseif($message>='100'){

                $botman->reply("Please take lots of rest, take napa if required. Consult our docbook doctors for further help");
            }
            else{
                $botman->reply("Sorry couldnt understand you");



            }

          
           
        });

        $botman->listen();
  

        



    }









    /**
     * Place your BotMan logic here.
     */
 


  






}
