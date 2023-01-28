# projeto-integrador
Projeto desenvolvimento para a conclusão do curso de Programação Web da turma de 2022 - Senac Viçosa-MG



Rodar o projeto

-instalar o docker e o laravel 
-clonar o repositório 

docker run --rm     -u "$(id -u):$(id -g)"     -v $(pwd):/var/www/html     -w /var/www/html     laravelsail/php81-composer:latest     composer install --ignore-platform-reqs
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm run dev


mkdir NomeDaPasta

cd NomeDaPasta

git clone https://github.com/LeonardoSenac/projeto-integrador.git

cd projeto-integrador

docker run --rm \ 
    -u "$(id -u):$(id -g)" \ 
    -v $(pwd):/var/www/html \ 
    -w /var/www/html \ 
    laravelsail/php81-composer:latest \ 
    composer install --ignore-platform-reqs

./vendor/bin/sail up -d

./vendor/bin/sail npm i

./vendor/bin/sail composer install

./vendor/bin/sail artisan migrate:fresh --seed

./vendor/bin/sail npm run dev

Projeto em trabalho

Bibliotecas extras
./vendor/bin/sail npm i sweetalert2
./vendor/bin/sail npm i -S @devindex/vue-mask