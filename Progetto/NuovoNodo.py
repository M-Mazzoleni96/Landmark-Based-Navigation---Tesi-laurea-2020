#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
import sys

cgitb.enable()
form = cgi.FieldStorage()

n1 =  sys.argv[1]
n2 =  sys.argv[2]
n3 =  sys.argv[3]
n4 =  sys.argv[4]
n5 =  sys.argv[5]
n6 =  sys.argv[6]
n7 =  sys.argv[7]


print("Content-Type: text/html;charset=utf-8")
print("\r\n")

form_data=cgi.FieldStorage()
print('Content-type:text/html\n\n')


with open("data/grafo.txt", "a") as file:
	file.write(str(n1)+","+str(n2)+","+str(n3)+","+str(n4)+","+str(n5)+","+str(n6)+","+str(n7)+"\n")
with open("data/nodi.txt") as file:
	if str(n2)+"\n" not in file.read():
		with open("data/nodi.txt", "a") as file:
			file.write(str(n2)+"\n")
	

redirectURL = "Admin.php#Aggiungi"
print('<html>')
print('  <head>')
print('    <meta http-equiv="refresh" content="0;url='+str(redirectURL)+'" />') 
print('  </head>')
print('</html>')