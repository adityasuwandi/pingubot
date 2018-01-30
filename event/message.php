<?php

/* Line BOT Examples */

class EventMessage extends LineBotFunctions{

  public function index($event){
    if($this->botEventType($event) == "message"){
      if($this->botEventMessageType($event) == "text"){
        switch ($this->botEventMessageText($event)) {
          // Button Template
          case 'buttons':
            // Action Button Array
            $action = [
              ["label" => "button 1","text" => "button 1"],
              ["label" => "button 2","text" => "button 2"],
              ["label" => "button 3","text" => "button 3"]
            ];
            $button = $this->botButtonTemplateBuilder("Example","LineBot Button Template","https://i.imgur.com/bYFMygZ.jpg",$action);
            $template = $this->botTemplateMessageBuilder("Message Builder Sample", $button);
            $this->botReplyMessage($event,$template);
            break;
          //Confirm Template
          case 'confirm':
            // Action Button Array
            $action = [ //Max 2
              ["label" => "button 1","text" => "button 1"],
              ["label" => "button 2","text" => "button 2"]
            ];
            $confirm = $this->botConfirmTemplateBuilder("Example?",$action);
            $template = $this->botTemplateMessageBuilder("Message Builder Sample", $confirm);
            $this->botReplyMessage($event,$template);
            break;
          // Carousel Template
          case 'carousel':
            // Carousel Array Data
            $array = [
              [
                'title' => "Carousel 1",
                'text' => "Carousel Example 1",
                'thumbnail' => "https://i.imgur.com/bYFMygZ.jpg",
                'actions' => [ //Action Button Array
                  ["label" => "button 1","text" => "button 1"],
                  ["label" => "button 2","text" => "button 2"]
                ]
              ],
              [
                'title' => "Carousel 2",
                'text' => "Carousel Example 2",
                'thumbnail' => "https://i.imgur.com/bYFMygZ.jpg",
                'actions' => [
                  ["label" => "button 1","text" => "button 1"],
                  ["label" => "button 2","text" => "button 2"]
                ]
              ]
            ];
            $carousel = $this->botCarouselTemplateBuilder($array);
            $template = $this->botTemplateMessageBuilder("Message Builder Sample", $carousel);
            $this->botReplyMessage($event,$template);
            break;
          default:
            if(strpos($this->botEventMessageText($event), 'apakah') !== false){
              $rad = rand(1,4);
              switch ($rad) {
                case '1':
                  $this->botReplyText($event, "Ya");
                  break;

                case '2':
                  $this->botReplyText($event, "Tidak");
                  break;

                case '3':
                  $this->botReplyText($event, "Sudah pasti ya kalau itu");
                  break;
                case '4':
                  $this->botReplyText($event, "Pikir sendiri, tanya terus kayak dora");
                  break;
                default:
                  $this->botReplyText($event, "wkwkwkwkwk");
                  break;
                }
            }
            $saru  = array('asu', 'fuck', 'shit', 'asu', 'bajingan','ngentot', 'babi', 'tai', 'anjing', 'kontol' );
            $nama  = array('ika', 'veronika xaveria', 'adot', 'kosim', 'zsazsa', 'pengu');
            foreach($saru as $r) {
                if(strpos($this->botEventMessageText($event), $r) !== false){
                    $this->botReplyText($event, "jijik ih sukanya ngomong jorok ):");
                }
            }
            foreach($nama as $p) {
                if(strpos($this->botEventMessageText($event), $p) !== false){
                    switch ($p) {
                      case 'ika':
                        $this->botReplyText($event, "hai ikaa cantik :3");
                        $this->botReplyText($event, $this->botSendSticker($event,1,4));

                        break;
                      case 'zsazsa':
                        $this->botReplyText($event, "hai tante zsazsa~");
                        $this->botReplyText($event, $this->botSendSticker($event,2,34));
                        break;
                      case 'kosim':
                        $this->botReplyText($event, "main sama om?");
                        $this->botReplyText($event,  $this->botSendSticker($event,1,109));

                        break;
                      case 'adot':
                        $this->botReplyText($event, "doooot");
                        break;
                      default:
                        # code...
                        break;
                    }
                }
            }
            break;
        }
      }
      else if ($this->botEventMessageType($event) == "image"){
        $control = rand(1,4);
        switch ($control) {
          case '1':
            $this->botReplyText($event, "anjir jelek amat mukanya wkwkwk");
            break;

          case '2':
            $this->botReplyText($event, "gambar apaan tuh!? bokep ya?");
            break;

          case '3':
            $profile = $this->botGetProfile($event);
            $displayName = $profile['displayName'];
            $this->botReplyText($event, $displayName . " left the group.");
            break;

          case '4':
            $this->botReplyText($event, "wkwkwkwkwkwkwk");
            break;

          default:
            $this->botReplyText($event, "wkwkwkwkwk");
            break;
        }
      }
    }
  }
}

?>
