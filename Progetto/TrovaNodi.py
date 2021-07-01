#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
cgitb.enable()

print("Content-Type: text/html;charset=utf-8")
print("\r\n")
import Grafo

#def stampaNodi():
    
lista1 = []
list_of_lists = []
list_of_tuples = Grafo.edges
i=0
for elem in list_of_tuples:
	list_of_lists.append(list(elem))
	del list_of_lists[i][2] #elimina il 3°parametro perché non serve
	i+=1
flat_list = [item for sublist in list_of_lists for item in sublist] #crea lista singola
lista1=list(set(flat_list)) #elimina duplicati
#print(lista1)

with open("nodi.txt", "w") as file:
	i = 0
	while i<lista1.__len__():
		print(lista1[i])
		file.write(str(lista1[i])+"\n")
		i=i+1
#return lista1