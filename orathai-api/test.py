#!/usr/bin/env python3 
# -*- coding: utf-8 -*- 
from flask import Flask
app = Flask(__name__)

from flask import Flask
app = Flask(__name__)

@app.route('/hello/<string:name>')
def Home(name):
    print(type(name))
    return ("<h1>Hello %s!! </h1>" % name)

if __name__ == '__main__':
  app.debug = True
  app.run(host='0.0.0.0', port=5000)