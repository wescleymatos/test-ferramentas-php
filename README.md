![alt tag](https://travis-ci.org/wescleymatos/test-ferramentas-php.svg?branch=dev) ![alt tag](https://scrutinizer-ci.com/g/wescleymatos/test-ferramentas-php/badges/quality-score.png?b=dev)

# test-ferramentas-php 

App para realizar testes com ferramentas php

Ferramentas de Gerenciamento de Dependência
* Composer

Ferramentas para análise de código:
* PHP Code_Sniffer: Estilo de Código
* PHPMD: Pontos de Refatoração
* PHPLoc: Medição e Análise Estrutural
* PHPCPD: Código Duplicado
* PHP Depend: Análise e Métrica
* PHP Metrics: Varias métricas para o código

Principais comandos:
* phpcs
** php vendor/bin/phpcs --standard=PSR2 src/
** php vendor/bin/phpcs --report=xml --report-file=metrics/phpcs.xml src/

* phpcpd
** php vendor/bin/phpcpd src/

* phploc
** php vendor/bin/phploc src/
** php vendor/bin/phploc --log-csv metrics/phploc.csv --progress src/

* pdepend
** php vendor/bin/pdepend --summary-xml=metrics/pdepend.xml --jdepend-chart=metrics/jdepend.png --overview-pyramid=metrics/pdepend.png src/

* phpmd
** php vendor/bin/phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode

* phpmetrics
** php vendor/bin/phpmetrics --report-html=metrics/phpmetrics.html src/

Ferramentas para Testes
* PHPunit
* Selenium IDE

Ferramentas de ORM
* Doctrine

Ferramentas de Injeção de Dependência
* PHP-DI
