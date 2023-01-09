from flask import Flask, request
from socket import gethostname
from datetime import datetime
from getopt import getopt, GetoptError
from sys import argv
from os import environ
from configparser import ConfigParser

app = Flask(__name__)

version = "v1.0"
logs = "false"

@app.route('/fibonacci', methods=['GET'])
def response():
  query_parameters = request.args
  message = fibonacci(query_parameters.get('n'))
  if logs == "true":
    log(message)
  return message

def fibonacci(nArgument):
  hostMessage = "Fibonacci " + version + "<br>Hello from <b>" + gethostname() + "</b><br>"
  try:
    n = int(nArgument)
  except ValueError:
    return hostMessage + "Error: <b>" + nArgument + "</b> is not an integer"

  if n < 0:
    return hostMessage + "Incorrect input: <b>" + nArgument + "</b>"

  if n == 0:
    return hostMessage + "Fibonnacci of 0 is <b>0</b>"
  if n == 1:
    return hostMessage + "Fibonnacci of 1 is <b>1</b>"

  a = 0
  b = 1
  for i in range(1, n):
    c = a + b
    a = b
    b = c
 
  return hostMessage + "Fibonnacci of " + str(n) + " is <b>" + str(b) + "</b>"

def log(message):
  logFile = open(getLogFile(), "a")
  logFile.write(str(datetime.now()) + "\n")
  logFile.write(message + "\n")
  logFile.write("-----------------------------\n")
  logFile.close()
  
def getLogFile():
  try:
    configFilePath = environ['CONFIG_FILE']
    config = ConfigParser()
    config.read(configFilePath)
    logFilePath = config['log']['path']
    logFileName = config['log']['filename']
    return logFilePath + logFileName
  except KeyError:
    print("Failed to read log file config. Returning default of /logs/system.log")
    return "/logs/system.log"

def parsParams(argv):
  global version
  global logs
  
  try:
    opts, args = getopt(argv,"v:l:",["version", "logs"])
    for opt, arg in opts:
      if opt in("-v", "--version"):
        version = arg
      elif opt  in("-l", "--logs"):
        logs = arg

  except GetoptError:
    print("error parsing input arguments")
  
if __name__ == '__main__':
  parsParams(argv[1:])
  app.run(debug=False, host='0.0.0.0')
