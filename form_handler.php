<?php


require "config.php";


if ( isset( $_POST['ips']))
{

    $ips = preg_split("/[\s+,]/", $_POST['ips']);

    foreach ( $ips as $ip)
    {

        $ip_arr[] = make32s(trim($ip));       
    }


    // if we have over X number of results, then return a text file of the results instead
    if ( count($ip_arr, COUNT_RECURSIVE) >= $result_threshold)
    {
        $ips = displayips($ip_arr, "\n");

        $filename = date('Y-m-d_G:i:s')."_"."ips.txt";

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Description: File Transfer");
        header("Content-type: application/txt");
        header("Content-Disposition: attachment; filename=$filename");
        header("Expires: 0");
        header("Pragma: public");

        $fh = fopen( 'php://output', 'w+');

        fputs($fh, $ips);

        fclose($fh);

        exit;
    } 
    else 
    {
        $output = displayips($ip_arr, "<br />");

        echo $output;
    }


}

/*
 * make32s will create /32 from IPs depending on if they are a network (192.168.1.0/24) or a range (10.1.1.0-10.1.1.10).  If the IP is already a /32, it will return back the signle host.
 *
 * @param   string  $ip IP string , either in range, network or standard dotted quad
 * @return  array   $ip An indexed array containing all the network or range broken into /32's
 */
function make32s($ip)
{

    if( strpos( $ip, "-"))
    {
       $ip =  IPTools::breakrange($ip);
    } 
    elseif ( strpos( $ip, "/"))
    {
        $ip_info = IPTools::cidrinfo($ip);

        $range = $ip_info['RANGE_START']."-".$ip_info['RANGE_END'];

        $ip = IPTools::breakrange($range);

    }
    else 
    {
        $ip = $ip;
    }

    return $ip;
}

/*
 * displayips takes an indexed array, and will output back each value in the array as a string with a line break of your choice
 *
 * @param   string  $ip_arr indexed array of IPs you would like to display
 * @param   string  $break  What line break you would like, common are "\n", or "<br />"
 */
function displayips($ip_arr, $break)
{

        $output = "";

        foreach ( $ip_arr as $eip_a)
        {
            if ( $eip_a == '') continue;

            if ( is_array($eip_a))
            {
                foreach ($eip_a as $eip)
                {
                    $output .= $eip . $break;
                }
            } 
            else 
            {
                $output .=  $eip_a . $break;
            }

        }

        return $output;
}
