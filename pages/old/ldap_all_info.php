<?php

    $adServer = "mexico.tem.mx";
	$ldap = ldap_connect($adServer);
    $username ='MRT06294';
    $password ='Rodrigo.09';
    $valor=explode('.',$adServer);
    $ldaprdn = $valor[0].'\\'.$username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


      $dc = explode(".", 'mexico.tem.mx');
      $base_dn = "";
      foreach($dc as $_dc) $base_dn .= "dc=".$_dc.",";
      $base_dn = substr($base_dn, 0, -1);

    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,$base_dn,$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }
?> 