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

Principais comandos:
* phpcs
** phpcs --standard=PSR2 path/to/code
** phpcs --report=xml --report-file=/path/to/file.xml /path/to/code

* phpcpd
** phpcpd path/to/code

* phploc
** phploc /path/to/code
** phploc --log-csv path/to/file.csv --progress /path/to/code

* pdepend
** pdepend --summary-xml=path/to/file.xml --jdepend-chart=path/to/file.png --overview-pyramid=path/to/file.png path/to/code

Ferramentas para Testes
* PHPunit
* Selenium IDE

Ferramentas de ORM
* Doctrine

Ferramentas de Injeção de Dependência
* PHP-DI
