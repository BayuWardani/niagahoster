FROM alpine:3.12
RUN apk --update add ca-certificates

RUN apk add  --no-cache  --repository http://dl-cdn.alpinelinux.org/alpine/edge/community php7 php7-fpm php7-opcache nano php7-pdo_mysql php7-pdo php7-ctype php7-json php7-session php7-gettext
RUN apk --no-cache add --repository http://dl-cdn.alpinelinux.org/alpine/edge/community php7-openssl php7-curl php7-mbstring php7-phar php7-dom \
    nginx supervisor curl
RUN apk update && apk add mysql-client && rm -f /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer 


# Configure nginx
COPY config/nginx.conf /etc/nginx/nginx.conf
RUN rm /etc/nginx/conf.d/default.conf
COPY config/_php.ini /etc/php7/conf.d/custom.ini
COPY config/php.ini /etc/php7/
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p /var/www/html/

RUN chown -R nobody.nobody /var/www/html && \
  chown -R nobody.nobody /run && \
  chown -R nobody.nobody /var/www/html && \
  chown -R nobody.nobody /var/lib/nginx && \
  chown -R nobody.nobody /var/log/nginx && \
  chown -R nobody.nobody /var/log/php7

USER nobody
WORKDIR /var/www/html
COPY --chown=nobody app/ /var/www/html
RUN composer install

EXPOSE 8005/tcp

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8005/fpm-ping
