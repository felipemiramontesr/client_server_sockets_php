La siguiente secuencia de pasos describe el proceso necesario para ejecutar los programas emuladores
de la arquitectura Cliente-Servidor desarrollados por el Ing. Felipe de Jesús Miramontes Romero
para ver la ultima version de los programas por favor acudir a: 
https://github.com/felipemiramontesr/client_server_sockets_php

Posibles entradas y salidas del programa:

('Lupita' => 4921210332, 'Grecia'=> 4921210331, 'Felipe'   => 4921210333, 
 'Roberto'=> 4921210330, 'Oyuki' => 4921210329, 'Juan'     => 4921210328,
 'Brisia' => 4921210318, 'Mayra' => 4921210326, 'Sustaita' => 4921210329, 
 'Tovar'  => 4921210324, 'Segio' => 4921210322, 'Mars'     => 4921210321, 
 'Juanis' => 4921210320, 'Tavo'  => 4921210319, 'Luis'     => 4921210318);

1.- Instalar easyphp: http://www.easyphp.org/easyphp-devserver.php
2.- Ejecutar easyphp
3.- Crear el siguiente directorio, C:sockets
4.- Copiar dentro de C:sockets, los programas, server.php y client.php
5.- Abrir dos ventanas de linea de comando (cmd) como administrador
6.- En cualquier ventana de linea de mando situarce dentro del directorio C:sockets
7.- Correr el siguiente comando: php -f server.php
8.- En la ventana de linea de comando restante situace dentro del directorio C:sockets
9.- Ejectutar el siguiete comando: php -f cliente.php
10.- Seguir las instrucciones que aparecen en pantalla para probar el compartamiento de las entidas cliente y servidor

Nota: Configure el tamaño de ventana adecuadamente para visualizar el comportamiento en tiempo real.