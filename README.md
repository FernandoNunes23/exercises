# exercises

## Pré-Requisitos
- Docker Compose 1.27.4 ou mais recente
- Docker 19.03.13 ou mais recente

## Rodando a aplicação
Para rodar a aplicação você deve acessar a pasta que contém os arquivos do sistema e subir com o docker-compose.
```bash
cd [my-app-name]
docker-compose up -d
```

Para rodar os scripts seguem os comandos

Exercicio 1

```bash
docker exec ciet_web_1 php exercicio1/ShowCountryAndCapital.php
```

Exercicio 2

```bash
docker exec ciet_web_1 php exercicio2/JoazinhoBiteFinger.php
```

Exercicio 3

```bash
docker exec ciet_web_1 php exercicio3/ShowExtensionList.php 
```

Exercicio 4

Acessar http://localhost:8080/exercicio4/form.html

Exercicio 5

Acessar http://localhost:8080/exercicio5/ParseXmlToCsv.php

Exercicio 6

Acessar http://localhost:8080/exercicio6/form.php

Exercicio 7

Acessar https://github.com/FernandoNunes23/simple-user-api
