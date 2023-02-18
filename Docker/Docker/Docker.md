# Docker 

## What is Docker?

[Docker](https://www.docker.com/) is a set of platform as a service products that use OS-level virtualization to deliver software in packages called containers. 

[Containers](https://hub.docker.com/) are isolated from one another, and bundle their own software, libraries and configuration files; they can communicate with each other through well-defined channels.

## Why Docker?

By using docker, you can easily deploy your application to any machine with docker installed. So when making a project u don't need to worry about the environment (Local, Developing, Production...).

So u won't hear again the word `It works on my machine`

## Let's make a single Docker file

So we are going to build a docker file that's run json server

First let's make a project

On that projcet create a directory **Dockerfile**

So first we need to tell docker from what container we need to run projcet by using `FROM` command.
So: 
```docker
FROM node:latest
```

We need to maka a directory name, run json-server and copy json file on that directory. We can do that by using 

`WORDIR` - for new directory

`RUN` - for run command

`COPY` - for copy file

```docker
WORKDIR /home/server

RUN npm install -g json-server

COPY db.json /home/server/db.json
```

json-server use port *3000* to run we can do that by using `Expose` command
```dokcer
EXPOSE 3000
```

And last we need to run json-server by using `CMD` command
```docker
ENTRYPOINT ["json-server", "db.json", "--host" , "0.0.0.0"]
```

So our Dockerfile look like this:
```docker
FROM node:latest

WORKDIR /home/server

RUN npm install -g json-server

COPY db.json /home/server/db.json

EXPOSE 3000

ENTRYPOINT ["json-server", "db.json", "--host" , "0.0.0.0"]
```

## Let's build our docker image

So we need to build our docker image by using `docker build` command

```bash
docker build .
```

Note: if u are using other names for docker change u need to specify that name, for example `docker build MYDOCKERFILE`

if u would like to name this image use `-t` flag for example `docker build -t NAME .`

Run the image 
```bash
docker run -p 3000:3000 <image_id> or <image_name>
```
to get image id use `docker image list` command


To stop the process
```bash
docker stop <container_id>
```
to get container id use `docker ps` command

## Let's make a docker-compose file

But first what is a **docker-compose file**?

Let's say we are going to build a Laravel project who needs: PHP, Database (MySql), NodeJS, Artisan Command,Server (ngnix),Redis. So we need 6+ container to run (That's a lot) and thats where Docker Compose come in.
 
[Docker-compose](https://docs.docker.com/compose/) is a tool for defining and running multi-container Docker applications. With Compose, you use a YAML file to configure your application’s services. Then, with a single command, you create and start all the services from your configuration.

To create a *docker compose* we need to create a file name `docker-compose.yml` on your project directory

First let tell what [version](https://docs.docker.com/compose/compose-file/compose-versioning/) we want to use
```docker
version: '3.7'
```

Now we need to tell docker what services we need to run and give they parameters like:
- Its image or dockerfile
- What port we are running
- What environment we need to run
- What volume we need to mount

```yml
version: '3.7'

services:
    mysql:
        image: mysql:latest
        ports:
            - 3310:3306
        environment:
            MYSQL_DATABASE: laravel
            MYSQL_USER: laravel
            MYSQL_ROOT_PASSWORD: secret
            MYSQL_PASSWORD: secret
        volumes:
            - ./mysql:/var/lib/mysql
        restart: unless-stopped
```

if u have a build dockerfile instend of  
```yml
    mysql:
        image: mysql:latest
```
use 
```yml
    mysql:
        context: .
        dockerfile: DOCKERFILE_NAME
```

What we do here 
- We are running mysql container 
- We are exposing port *3310* to *3306* (we can use 3306:3306 its no problem)
- We are making an environment for a database like (database_name, user, password)
- We are mounting volume to save data 
    - **./mysql** - it's our project directory 
    - **/var/lib/mysql** - its mysql directory for server in our case (ngnix)

- We are telling docker to restart container if it stoped

Now we need to run our container by using `docker-compose up` command

```bash
docker ompose up
```
or 
```bash
docker compose up --build # if u have build
```

if u want to run it in background use `-d` flag
```bash
docker compose up -d
```

To stop the process
```bash
docker compose down
```

Let's say u already have composer set up on your container and u want to run a command for creating laravel project for example `composer create-procjet laravel/larvel NAME`
to do that first u need to run docker container 

```bash
docker container run --rm composer create-procjet laravel/larvel .
```
Note: `--rm` flag is for remove container after run

This logic can be use on every container 
