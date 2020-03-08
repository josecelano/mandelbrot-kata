FROM python:3.6.9

RUN pip3 install Pillow \
    && pip3 install -U pytest

COPY . /usr/src/app
WORKDIR /usr/src/app

ENTRYPOINT ["python3", "-m"]

CMD ["pytest"]