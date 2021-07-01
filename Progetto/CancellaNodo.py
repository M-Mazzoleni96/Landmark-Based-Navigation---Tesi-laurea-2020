#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
import fnmatch
import os

cgitb.enable()
form = cgi.FieldStorage()
delet =  form.getvalue('delet')
newN = ""

print("Content-Type: text/html;charset=utf-8")
print("\r\n")

from Grafo import graph
#from flask import Flask
#from flask import request
#from flask import render_template
form_data=cgi.FieldStorage()
#print('Content-type:text/html\n\n')

#print(delet)
for file in os.listdir('img/'):
    #print(file)
    if (fnmatch.fnmatch(file, delet+'*.jpg') or fnmatch.fnmatch(file, '*'+delet+'.jpg') ):
        #print('true')
        os.remove("img/"+file)
    #else:
        #print('false')


fn = 'data/grafo.txt'
f = open(fn)
output = []
for line in f:
    if not delet in line:
        output.append(line)
f.close()
f = open(fn, 'w')
f.writelines(output)
f.close()
#---------------------
fn = 'data/nodi.txt'
f = open(fn)
output = []
for line in f:
    if not delet in line:
        output.append(line)
f.close()
f = open(fn, 'w')
f.writelines(output)
f.close()

			
redirectURL = "Admin.php#Elimina"
print('<html>')
print('  <head>')
print('    <meta http-equiv="refresh" content="0;url='+str(redirectURL)+'" />') 
print('  </head>')
print('</html>')