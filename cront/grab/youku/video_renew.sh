#/usr/bin/sh
while [ 1 ]
do
  echo "renew"
  /usr/local/php/bin/php /var/www/html/videostv/cront/grab/youku/tvrenewgrab.php
  /usr/local/php/bin/php /var/www/html/videostv/cront/grab/youku/movierenewgrab.php
  /usr/local/php/bin/php /var/www/html/videostv/cront/grab/youku/varietyrenewgrab.php
  /usr/local/php/bin/php /var/www/html/videostv/cront/grab/youku/animetvrenewgrab.php
  sleep 2m
done
