# simple-tgcli
simple telegram-cli message sender with group channel and ...

this is class connect with nc to telegram-socket and run execute very fast you can with this class send batch message from random phone number to users and method is :

this is for send batch message :

    public function multiTaskMakerMsg($phones, $msg)
    {
     
                             for ($i = 0; $i <= count($phones) - 1; $i++) {

                              $p          = $phones[$i];
                              $print_name = $p . '_' . $p;

                              $res[] = "msg $print_name $msg";

                  
                              }
                
         return $res;
    }


this is for send message with channel :


  public function multiTaskMakerC($phones, $msg, $channelname)
      {
           $res = array("create_channel $channelname $channelname", "add_contact 00989383381119 behzad mon", "channel_invite                      $channelname behzad_mon", "channel_set_admin $channelname behzad_mon 1");
           $res = array();
             for ($i = 0; $i <= count($phones); $i++) {

                              $g = $channelname;
                              $p = $phones[$i];

                              $print_name = $p . '_' . $p;

                              $resb[] = "history $print_name 10";
                              $resa[] = "channel_invite $channelname $print_name";

                              $resb[] = "msg $h $msg";

                    }
                    $v = array_merge($res, $resb, $resa);
                    return $v;
      }


and this for send with group


  public function multiTaskMakerG($phones, $msg)
  {
  $g = $this->MakeRandomGroupName(8);
                              $h = $g;
                              $p = $phones[$i];

                              $print_name = $p . '_' . $p;

                              $res[]  = "create_group_chat $h $print_name";
                              $resa[] = "history $print_name 10";
                              $resb[] = "msg $h $msg";

                    }
                    $v = array_merge($res, $resa, $resb);
                    return $v;
   }

if you have question msg to me in telegram username @behzadz
