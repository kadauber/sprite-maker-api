# sprite-maker-api
For a Digital Electronics Lab project. An api to connect to a sql database to manage sprites I'm creating.

The following curl commands work: 

CRUD Sprites
curl http://kadauber.scripts.mit.edu/sprite-maker-api/sprite/read.php
curl -d '{"name":"my sprite"}' http://kadauber.scripts.mit.edu/sprite-maker-api/sprite/create.php
curl -d '{"id":"1","name":"my first sprite"}' http://kadauber.scripts.mit.edu/sprite-maker-api/sprite/update.php
curl -d '{"id":"1"}' http://kadauber.scripts.mit.edu/sprite-maker-api/sprite/delete.php

CRUD Pixels
curl http://kadauber.scripts.mit.edu/sprite-maker-api/pixel/read.php
curl -d '{"spriteId":"1","position":"0","color":"#000"}' http://kadauber.scripts.mit.edu/sprite-maker-api/pixel/create.php
curl -d '{"id":"1","color":"#F00"}' http://kadauber.scripts.mit.edu/sprite-maker-api/pixel/update.php
curl -d '{"id":"1"}' http://kadauber.scripts.mit.edu/sprite-maker-api/pixel/delete.php
