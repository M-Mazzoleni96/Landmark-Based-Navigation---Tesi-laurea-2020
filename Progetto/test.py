#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb #found this but isn't used?

form = cgi.FieldStorage()

first_name = form.getvalue('start').capitalize()
last_name  = form.getvalue('finish').capitalize()

print ("Content-type:text/html\r\n\r\n")
print ("<html>")
print ("<head>")
print ("<title>Hello - Second CGI Program</title>")
print ("</head>")
print ("<body>")
print ("<h2>Your name is {}. {} {}</h2>".format(last_name, first_name, last_name))
print ("</body>")
print ("</html>")