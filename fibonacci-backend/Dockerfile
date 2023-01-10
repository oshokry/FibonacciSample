FROM ubuntu
RUN apt-get update -y
RUN apt-get upgrade -y

RUN apt-get install python3-pip -y
RUN apt-get install curl -y
RUN pip3 install Flask
RUN pip3 install sockets

COPY api.py /scripts/api.py
ENTRYPOINT ["python3", "-u", "/scripts/api.py"]
# CMD ["-v", "v3.0", "-l", "true"]
