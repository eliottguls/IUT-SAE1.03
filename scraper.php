#!/usr/local/bin/php
<?php
   $fic_config = 'config';
   $fic_liste = 'liste';
   $dir_in = 'step1';
   $dir_out = 'step2';

   echo "Création des dossiers $dir_in et $dir_out\n";
   if (!is_dir($dir_in)) {
      mkdir($dir_in);
   }
   if (!is_dir($dir_out)) {
      mkdir($dir_out);
   }
   echo "En attente de $dir_in/$fic_config\n";
   while (true) {
      if (is_file("$dir_in/$fic_config")) {
         echo "Trouvé $dir_in/$fic_config\n";
         $conf = file("$dir_in/$fic_config");
         $str = '';
         foreach($conf as $line) {
            $parts = explode('=', trim($line));
            $url = $parts[1];
            echo "Fetch $url\n";
            $html = str_replace('> ', ">\n", str_replace("\n", ' ', file_get_contents($url)));
            preg_match_all('/<img .*src="([^"]+)".*\/>/', $html, $matches);
            foreach ($matches[1] as $imgurl) {
               $str .= "$imgurl\n";
            }
         }
         file_put_contents("$dir_out/$fic_liste", $str);
         echo "Fin traitement\n";
         rename("$dir_in/$fic_config", "$dir_out/$fic_config");
      }
      sleep(5);
   }
?>