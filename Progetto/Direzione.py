#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
cgitb.enable()





direz=[]


with open('data/grafo.txt', 'r') as f:

	direz = [tuple(map(lambda x:x.strip(), i.split(','))) for i in f]

	direz = [(e) for a, b, c, d, e, f, g in direz] #prendi 5° elemento da ogni riga

def orienta(da,a):
	svolta="nullo"
	
	if(da=="Nord"):
	
		if(a=="Est"):
			svolta="Svolta a destra"
		elif(a=="Ovest"):
			svolta="Svolta a sinistra"
		elif(a=="Nord"):
			svolta="prosegui dritto"
			
	elif(da=="Sud"):
	
		if(a=="Est"):
			svolta="Svolta a destra"
		elif(a=="Ovest"):
			svolta="Svolta a sinistra"
		elif(a=="Sud"):
			svolta="prosegui dritto"
			
	elif(da=="Ovest"):
	
		if(a=="Nord"):
			svolta="Svolta a destra"
		elif(a=="Sud"):
			svolta="Svolta a sinistra"
		elif(a=="Ovest"):
			svolta="prosegui dritto"
			
	elif(da=="Est"):
	
		if(a=="Nord"):
			svolta="Svolta a sinistra"
		elif(a=="Sud"):
			svolta="Svolta a destra"
		elif(a=="Est"):
			svolta="prosegui dritto"
			
	return svolta

