from flask import Flask, render_template, redirect, request, flash
import os

app = Flask(__name__)
app.secret_key = 'veto'

@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)