<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Traits\RequestTrait;


class TelegramController extends Controller
{

  use RequestTrait;

  public function webhook()
  {
    return $this->apiRequest('setWebhook',[
      'url' => str_replace('http' , 'https', url(route('webhook')))
      ]) ? ['success'] : ['something wrong'];
  }

  public function updatedActivity()
   {
       $activity = Telegram::getUpdates();
       $texto=$activity[count($activity)-1]->getMessage()->getText();
       if($texto == '/lamina'){
         $document = InputFile::createFromContents(file_get_contents('anexos/sistema digestivo.pdf'),'anexos/sistema digestivo.pdf');
         Telegram::sendDocument([
           'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001465621354'),
           'document' => $document,
           'caption' => 'Envio de Documento',
         ]);
       }
       dd($activity);

   }

   public function sendMessage()
   {
       return view('telegram.message');
   }

   public function storeMessage(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'message' => 'required'
       ]);

       $text = "A new contact us query\n"
           . "<b>Email Address: </b>\n"
           . "$request->email\n"
           . "<b>Message: </b>\n"
           . $request->message;

       Telegram::sendMessage([
           'chat_id' => env('TELEGRAM_CHANNEL_ID', '773684137'),
           'parse_mode' => 'HTML',
           'text' => $text
       ]);

       return redirect()->back();
   }

   public function sendPhoto()
   {
       return view('telegram.photo');
   }

   public function storePhoto(Request $request)
   {
       $request->validate([
           'file' => 'file|mimes:jpeg,png,gif'
       ]);

       $photo = $request->file('file');

       Telegram::sendPhoto([
           'chat_id' => env('TELEGRAM_CHANNEL_ID', '773684137'),
           'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), str_random(10) . '.' . $photo->getClientOriginalExtension())
       ]);

       return redirect()->back();
   }
}
