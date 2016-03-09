<?php
//TELEGRAM PHP\\
// DEVELOPER : BEHZAD MONFARED\\
//telegram phone @behzadz
// V1\\
//MAHAN.SM@GMAIL.COM\\

class TGB
{

          public function runTg($comand)
          {

                    $ip   = "";
                    $p    = rand(7000, 70300);
                    $port = $p;

                    exec("echo $comand  | nc $ip $port -t -w 2", $o);

                    return $o;

          }

          public function add($phonenum)
          {

                    $print_name = $phonenum . '_' . $phonenum;

                    $comand = "add_contact $phonenum $phonenum $phonenum";

                    return $this->runTg($comand);

                    // $print_name;

          }

          public function Broadcast($msg, $phone)
          {

                    //$response = add($phone);

                    $command = "broadcast $phone $msg";

                    return run($command);

          }

          public function GroupMsg()
          {

          }

          public function ChannelGroup()
          {

          }

          public function SendPhoto($link, $phone, $name)
          {
                    $this->add($phone);

                    $path = $this->Download($link, $name);

                    $print_name = $phone . '_' . $phone;

                    $command = "send_photo $print_name $path";

                    return $this->runTg($command);
          }

          public function SendFile($link, $phone, $name)
          {

                    $path = Download($link, $name);

                    $print_name = $phone . '_' . $phone;

                    $command = "send_file $print_name $path";

                    return run($command);

          }

          public function SendMusic($link, $phone, $name)
          {

                    $path = Download($link, $name);

                    $print_name = $phone . '_' . $phone;

                    $command = "send_music $print_name $path";

                    return run($command);
          }

          public function jsons()
          {

                    $fs = $this->import('logger/log.txt');
                    foreach ($fs as $val) {

                              $fz = $this->Find($val, '{', '}');
                              $bs = '{' . $fz . '}';

                              $vs = str_replace('{}', '', $bs);

                              $v[] = $vs;

                    }

                    $g  = print_r($v, false);
                    $bb = json_encode($g);
                    return $bb;
          }

          public function jsoner($out)
          {

                    $c = $out;

                    $kama = "},{";
                    $vsx  = str_replace("}{", $kama, $c);
                    $json = json_decode($vsx, true);

                    ini_set('display_errors', 0);
                    $g = array();

                    $all = count($json) / 2;

                    for ($i = 0; $i < 1; $i++) {

                              foreach ($json as $phone) {

                                        $p = $phone['print_name'];
                                        if (!empty($p)) {
                                                  $ps[] = $p;
                                        }

                              }

                              foreach ($json as $res) {

                                        $r = $res['result'];
                                        if (!empty($r)) {
                                                  $b[] = $r;
                                        }
                              }

                              $xb = array_merge($b, $ps);

                              $qq = count($xb) / 2;
                              $ra = $qq + $i;

                              for ($i = 0; $i < $ra; $i++) {

                                        $v[$i]['result'] = $xb[$i];
                                        $v[$i]['date']   = date("Y/M/D");

                                        $v[$i]['print_time'] = $xb[$qq + $i];

                              }

//var_dump($v);
                              $vz = json_encode($v);
                              return $vz;

                              //var_dump($xb);
                              $v = json_encode($xb);

                    }

          }

          public function SendMovie($link, $phone, $name)
          {

                    $path = Download($link, $name);

                    $print_name = $phone . '_' . $phone;

                    $command = "send_video $print_name $path";

                    return run($command);

          }

          public function SendText($link, $phone, $name)
          {

                    $path = $this->Download($link, $name);

                    $print_name = $phone . '_' . $phone;

                    $command = "send_text $print_name $path";

                    return $this->runTg($command);
          }

          public function Report()
          {

          }

          public function Download($link, $name)
          {

                    $url = "http://ip/dl.php?link=$link&name=$name";

                    file_get_contents($url);

                    return "/var/www/html/$name";

          }

          public function output($z, $data)
          {

                    switch ($z) {

                              case "resnumber":

                                        return $data[0];
                                        break;

                              case "json":

                                        return $data[1];
                                        break;

                    }

          }

          public function jsondecode($data, $n)
          {

                    $json = json_decode($data);

                    foreach ($json as $item) {

                              $m[] = $item;

                    }

                    return $m;

          }

          public function multiTaskMakerAdd($phones)
          {

                    for ($i = 0; $i <= count($phones); $i++) {

                              $p = $phones[$i];

                              $printname = $p . '_' . $p;

                              $res[] = "add_contact $p $p $p";

                    }
                    return $res;
          }
          public function Find($string, $start, $end)
          {

                    $string = ' ' . $string;
                    $ini    = strpos($string, $start);
                    if ($ini == 0) {
                              return '';
                    }

                    $ini += strlen($start);
                    $len = strpos($string, $end, $ini) - $ini;
                    return substr($string, $ini, $len);
          }

          public function import($x)
          {
                    $names = file($x);

                    foreach ($names as $name) {
                              $all[] = $name;

                    }
                    return $all;
          }
          public function multiTaskMakerMsg($phones, $msg)
          {

                    //          $res = array();
                    for ($i = 0; $i <= count($phones) - 1; $i++) {

                              $p          = $phones[$i];
                              $print_name = $p . '_' . $p;

                              $res[] = "msg $print_name $msg";

                              //          sleep(1);
                    }
                    return $res;
          }

          public function multiTaskMakerC($phones, $msg, $channelname)
          {
                    $res = array("create_channel $channelname $channelname", "add_contact 00989383381119 behzad mon", "channel_invite $channelname behzad_mon", "channel_set_admin $channelname behzad_mon 1");
                    //          $res = array();
                    for ($i = 0; $i <= count($phones); $i++) {

                              $g = $channelname;
                              $p = $phones[$i];

                              $print_name = $p . '_' . $p;

                              $resb[] = "history $print_name 10";
                              $resa[] = "channel_invite $channelname $print_name";

                              //          $resb[] = "msg $h $msg";

                    }
                    $v = array_merge($res, $resb, $resa);
                    return $v;
          }

          public function multiTaskMakerG($phones, $msg)
          {

                    //          $res = array();
                    for ($i = 0; $i <= count($phones) - 1; $i++) {

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

          public function fromtxt($file)
          {
                    $g  = file_get_contents($file);
                    $gj = explode('|', $g);
                    $p  = count($gj);

                    for ($i = 0; $i <= count($gj); $i++) {
                              $x = $gj[$i];
                              if (!empty($x)) {

                                        $phones[] = $x;
                              }

                    }
                    return $phones;
          }
          public function MakeRandomGroupName($length)
          {
                    $characters       = 'abcdefghijklmnopqrstuvwxyz';
                    $charactersLength = strlen($characters);
                    $randomString     = '';
                    for ($i = 0; $i < $length; $i++) {
                              $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
          }

          public function multiTaskMakerPic($phones, $pic)
          {

                    //          $res = array();
                    for ($i = 0; $i <= count($phones) - 1; $i++) {

                              $p = $phones[$i];

                              $print_name = $p . '_' . $p;

                              $res[] = "send_photo $print_name $pic";

                    }
                    return $res;
          }

          public function outputj()
          {

                    $l = file_get_contents('log.txt');
                    $h = explode('{', $l);
                    for ($i = 0; $i > count($h); $i++) {

                              $j[] = '{' . $h[$i];

                    }
                    sleep(4);
                    return $j;
          }

          public function multiTask($tasks, $port)
          {
                    //          mkdir('logger');

                    $vfile = rand(1111, 9999);

                    $descriptors = array(
                              0 => array("pipe", "r"),
                              1 => array("file", "logger/log.txt", "a"),
                    );

                    $process = proc_open("nc ip $port", $descriptors, $pipes);

                    if (is_resource($process)) {

                              sleep(1);
                              for ($i = 0; $i <= count($tasks); $i++) {
                                        $task = $tasks[$i];
                                        fwrite($pipes[0], "$task\n");
                                        ///echo $read = fread($process, 2096);

                                        //file_put_contents('log.txt',$read);

                                        //          sleep(3);
                              }
                              fclose($pipes[0]);

                              $return_value = proc_close($process);
                    }

                    return;

          }

          public function DBtg()
          {

                    include_once 'db/class.DBPDO.php';
                    $DB = new DBPDO();
                    $DB->execute("UPDATE message SET to = 'newemail@domain.com'");

          }

}
