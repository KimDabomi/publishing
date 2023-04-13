<?php
      $script_config = array(
        'site_id' => '64363c24217d6fbfb697eda1',
        'remote_url' => 'http://sitemap.calllink.io/api/v1/'
      );
      if(!function_exists('curl_init')){
          echo 'Error: cURL library not enabled';
          exit;
      }
      $sitemap_filename = isset($_GET['sn']) ? preg_replace('#[^a-z\d\.\_\-]#i', '', $_GET['sn']) : 'sitemap.xml';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $script_config['remote_url']);
      $headers = array(
          'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
          'Content-Type: application/json',
      );
      $fields = array(
          'site_id' => $script_config['site_id'],
          'sitemap_id' => $sitemap_filename
      );
      $json_data = json_encode($fields);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  
      $result = curl_exec($ch);
      $info = curl_getinfo($ch);
      curl_close($ch);
  
      if(($info['http_code'] != '200') || strstr($info['content_type'], 'json') ){
        $status_message = '503 Service Temporarily Unavailable';
        header('HTTP/1.1 '.$status_message);
        header('Status: '.$status_message);
        header('Retry-After: 300');
        echo $status_message;
      }else {
          header('Content-Type: ' . $info['content_type']);
          header('Content-Length: ' . strlen($result));
          echo $result;
      }
      exit;
  