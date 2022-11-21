# Emprega Viçosa
Projeto desenvolvido para a conclusão do curso de Programação Web da turma de 2022

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
