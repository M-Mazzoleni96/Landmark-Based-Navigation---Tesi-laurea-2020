#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
cgitb.enable()
form = cgi.FieldStorage()
nm1 =  form.getvalue('nm1')
newDist = form.getvalue('newDist')
newAct = form.getvalue('newAct')
newTurn = form.getvalue('newTurn')


#print("Content-Type: text/html;charset=utf-8")
print("\r\n")

#from Grafo import graph
#from flask import Flask
#from flask import request
#from flask import render_template
form_data=cgi.FieldStorage()
#print('Content-type:text/html\n\n')


import fileinput

with fileinput.FileInput ('data/grafo.txt', inplace=True) as file:
    for line in file:
        line=line.rstrip()
        if(line == nm1):
            
            line = line.replace(line.split (',')[2], newDist)
            line = line.replace(line.split (',')[3], newAct)
            line = line.replace (line.split (',')[4], newTurn)
            print(line, end='\n')
        else:
            print(line, end='\n')

redirectURL = "Admin.php#Modifica"
print('<html>')
print('  <head>')
print('    <meta http-equiv="refresh" content="0;url='+str(redirectURL)+'" />')
print('  </head>')
print('</html>')