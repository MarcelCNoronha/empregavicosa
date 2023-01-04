# Emprega Viçosa
Projeto desenvolvido para a conclusão do curso de Programação Web da turma de 2022

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
