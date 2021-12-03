ACERCA DE :
-------------
El proyecto usa docker con docker-compose.

- Para arrancarlo:

$ docker-compose up -d

- Crear BD:

$ docker-compose exec php-fpm bin/console doc:sc:cre

- Instalar vendors:

$ docker-compose exec php-fpm composer install

- Instalar datos de prueba:

$ docker-compose exec php-fpm bin/console doc:fix:load --no-interaction

El proyecto se puede acceder via navegador a traves de: 
http://localhost:4199


CONSIDERACIONES:
----------------

Han habido algunos puntos en la descripcion de la prueba algo confusos que he tenido que tomar decisiones 
al respecto para modelar la BD o entender que acciones se querian.

No cabe decir que todo es muy mejorable y darle otro enfoque, debdio al poco tiempo del que he tenido esta semana
he ido avanzando conforme el tiempo que he podido disponer. 

La parte de tests, solo he creado unos cuantos a modo de ejemplo, pero habria que tener tests para todos los 
servicios, etc.

He intentado aplicar DDD en la mayoria de sitios, pero algunos por falta de tiempo no los he podido hacer
como me hubiera gustado, pero en general el desarrollo sigue esta arquitectura. He usado VO para las propiedades de 
las entidades. En las entidades he usado anotaciones porque me ha resultado mas rapido, pero se podrian mover 
a ficheros .yml. Para los IDs he usado la libreria Ramsey de UUIDs.

En general, he usado PSR para la codificacion, git flow, etc.