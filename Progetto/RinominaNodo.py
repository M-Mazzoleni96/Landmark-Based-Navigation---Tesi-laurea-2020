#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
cgitb.enable()
form = cgi.FieldStorage()
nr1 =  form.getvalue('nr1')
newN = form.getvalue('newN')

#print("Content-Type: text/html;charset=utf-8")
print("\r\n")

#from Grafo import graph
#from flask import Flask
#from flask import request
#from flask import render_template
form_data=cgi.FieldStorage()
#print('Content-type:text/html\n\n')


import fileinput

with fileinput.FileInput('data/nodi.txt', inplace=True) as file:
    for line in file:
        print(line.replace(nr1, newN), end='')
		
with fileinput.FileInput('data/grafo.txt', inplace=True) as file:
    for line in file:
        print(line.replace(nr1, newN), end='')

redirectURL = "Admin.php#Rinomina"
print('<html>')
print('  <head>')
print('    <meta http-equiv="refresh" content="0;url='+str(redirectURL)+'" />') 
print('  </head>')
print('</html>')