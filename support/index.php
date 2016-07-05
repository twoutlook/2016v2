<?php

/**
  +-------------------------------------------------------------------------+
  | Roundcube Webmail IMAP Client                                           |
  | Version 1.2.0                                                           |
  |                                                                         |
  | Copyright (C) 2005-2016, The Roundcube Dev Team                         |
  |                                                                         |
  | This program is free software: you can redistribute it and/or modify    |
  | it under the terms of the GNU General Public License (with exceptions   |
  | for skins & plugins) as published by the Free Software Foundation,      |
  | either version 3 of the License, or (at your option) any later version. |
  |                                                                         |
  | This file forms part of the Roundcube Webmail Software for which the    |
  | following exception is added: Plugins and Skins which merely make       |
  | function calls to the Roundcube Webmail Software, and for that purpose  |
  | include it by reference shall not be considered modifications of        |
  | the software.                                                           |
  |                                                                         |
  | If you wish to use this file in another project or create a modified    |
  | version that will not be part of the Roundcube Webmail Software, you    |
  | may remove the exception above and use this source code under the       |
  | original version of the license.                                        |
  |                                                                         |
  | This program is distributed in the hope that it will be useful,         |
  | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the            |
  | GNU General Public License for more details.                            |
  |                                                                         |
  | You should have received a copy of the GNU General Public License       |
  | along with this program.  If not, see http://www.gnu.org/licenses/.     |
  |                                                                         |
  +-------------------------------------------------------------------------+
  | Author: Thomas Bruederli <roundcube@gmail.com>                          |
  | Author: Aleksander Machniak <alec@alec.pl>                              |
  +-------------------------------------------------------------------------+
 */
// include environment
//require_once 'program/include/iniset.php';
echo "any problem for require_once???";
return;


require_once '../webmail/program/include/iniset.php';


// init application, start session, init output class, etc.
$RCMAIL = rcmail::get_instance(0, $GLOBALS['env']);
//echo 'print_r($RCMAIL->user); ';
//print_r($RCMAIL->user);
echo 'print_r($RCMAIL->user->data);<hr> ';
print_r($RCMAIL->user->data);
echo "<hr>";
echo 'foreach ($arr as $key => $value)<br> ';
$arr = $RCMAIL->user->data;
foreach ($arr as $key => $value) {
    echo "$key => $value <br>";
}

echo "<hr>";
echo 'echo $arr[\'username\'] ;  <br> ';
echo $arr['username'];




return;

header('Content-Type: text/xml; charset=UTF-8');
echo print_r_xml($RCMAIL);

function print_r_xml($arr, $first = true) {
    $output = "";
    if ($first)
        $output .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<data>\n";
    foreach ($arr as $key => $val) {
        if (is_numeric($key))
            $key = "arr_" . $key; // <0 is not allowed
        switch (gettype($val)) {
            case "array":
                $output .= "<" . htmlspecialchars($key) . " type='array' size='" . count($val) . "'>" .
                        print_r_xml($val, false) . "</" . htmlspecialchars($key) . ">\n";
                break;
            case "boolean":
                $output .= "<" . htmlspecialchars($key) . " type='bool'>" . ($val ? "true" : "false") .
                        "</" . htmlspecialchars($key) . ">\n";
                break;
            case "integer":
                $output .= "<" . htmlspecialchars($key) . " type='integer'>" .
                        htmlspecialchars($val) . "</" . htmlspecialchars($key) . ">\n";
                break;
            case "double":
                $output .= "<" . htmlspecialchars($key) . " type='double'>" .
                        htmlspecialchars($val) . "</" . htmlspecialchars($key) . ">\n";
                break;
            case "string":
                $output .= "<" . htmlspecialchars($key) . " type='string' size='" . strlen($val) . "'>" .
                        htmlspecialchars($val) . "</" . htmlspecialchars($key) . ">\n";
                break;
            default:
                $output .= "<" . htmlspecialchars($key) . " type='unknown'>" . gettype($val) .
                        "</" . htmlspecialchars($key) . ">\n";
                break;
        }
    }
    if ($first)
        $output .= "</data>\n";
    return $output;
}
