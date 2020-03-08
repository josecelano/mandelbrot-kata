FROM node:13.8.0

COPY . /usr/src/app
WORKDIR /usr/src/app

RUN npm install

ENTRYPOINT ["npm", "run"]

CMD [ "test" ]