#!C:\Users\Marcello\AppData\Local\Programs\Python\Python38-32\python.exe
import cgi
import cgitb
import urllib

	
cgitb.enable()
form = cgi.FieldStorage()
start =  form.getvalue('start')
finish =  form.getvalue('finish')
vista =  form.getvalue('vista')
moto = form.getvalue('moto')


print("Content-Type: text/html;charset=utf-8")
print("\r\n")


import Dijkstra
from Dijkstra import dijsktra

from Direzione import orienta

if __name__ == "__main__":
	from Grafo import graph
	dijkstra = dijsktra(graph, start, finish)
	if(dijkstra!= "inesistente"):
		i=1
		
		with open('data/grafo.txt', 'r') as g: #recupero descrizione immagine
			descr = [tuple(map(lambda x:x.strip(), i.split(','))) for i in g]
			descr = [(f) for a, b, c, d, e, f, g in descr] #prendi 6° elemento da ogni riga
		
		with open("cont.html", "w") as file:
			#file.write(str(descr)) #-----------------------------------------------------------------
			file.write("<div id=\"istruzione\"> <h1 id=\"passo0\">Partenza da "+str(dijkstra[0])+"</h1>")
			
			file.write("<div id=\"drz\">(Altre direzioni possibili:"+str(graph.edges[str(dijkstra[0])])+")</div>")
			
			#image=str(dijkstra[0]).replace(' ', '%20')
			#descr[0]=descr[0].replace(' ', '&nbsp;')
			
			#file.write("<div id=\"imm\"><img class=\"responsive-img\" src=img/"+image+".jpg alt= descrizione:&nbsp;"+descr[0]+"></div></div>")
			#file.write("-")
		lung=dijkstra.__len__()

		with open('data/grafo.txt', 'r') as f:
			azione = [tuple(map(str, i.split(','))) for i in f]
			azione = [(d) for a, b, c, d, e, f, g in azione]
			
		with open('data/grafo.txt', 'r') as g:
			direz = [tuple(map(lambda x:x.strip(), i.split(','))) for i in g]
			direz = [(e) for a, b, c, d, e, f, g in direz] #prendi 5° elemento da ogni riga

		
			for i in range(1, lung):
				lookup=str(dijkstra[i-1]+","+dijkstra[i])
				
				with open('data/grafo.txt', 'r') as id: #cerco la coppia di nodi per trovare a che riga è scritto in grafo.txt
					for num, line in enumerate(id, 1):
						if lookup in line:
							x=num-1
							
				with open("cont.html", "a") as file:
					vpasso="passo"+str(i)
					
					
					if(i >= 2):
					
						#file.write("da "+prec+" a "+direz[x]+"-")
						vai=orienta(prec,direz[x])
						if(vai=="prosegui dritto"):
							file.write("<h1 id="+vpasso+">Oltrepassa "+str(dijkstra[i-1])+" e " +azione[x]+ " per "+str(Dijkstra.pesi[i-1])+" metri fino a <div style=\"display:inline-block\" id=\"stanza\">"+ str(dijkstra[i])+"</div></h1>")
						else:
							file.write("<h1 id="+vpasso+"> "+ vai +" e " +azione[x]+ " per "+str(Dijkstra.pesi[i-1])+" metri fino a <div style=\"display:inline-block\" id=\"stanza\">"+ str(dijkstra[i])+"</div></h1>")
					else:
						
						file.write("<h1 id=passo1>" +azione[x]+ " per "+str(Dijkstra.pesi[i-1])+" metri fino a <div style=\"display:inline-block\" id=\"stanza\">"+ str(dijkstra[i])+"</div></h1>")
					
					prec=direz[x]
					
					if(i in range(1, lung-1)):
						file.write("<div id=\"drz\">(Direzioni possibili:"+str(graph.edges[str(dijkstra[i])])+")</div>")
					
					image=str(dijkstra[i-1]+str(dijkstra[i])+".jpg")
					image=image.replace(' ', '%20')
					
					
					file.write("<div id=\"imm\"><img class=\"responsive-img\" src=img/"+image+" alt= \"descrizione: "+str(descr[x])+"\"></div>")
					
			totPeso=Dijkstra.total_weight

		with open("cont.html", "a") as file:
			vpasso="passo"+str(lung)
			file.write ("<h1 id="+vpasso+">sei arrivato a "+str(dijkstra[lung-1])+"</h1>")
			tempo=round((((totPeso)/1.5)/60),2)
			file.write ("<h1>Distanza percorsa: "+str(totPeso)+" metri</h1>")
			#in "+str(tempo)+" minuti")
			file.write("<a class=\"waves-effect waves-light btn-large\" onclick=\"location.href='LMBN.php';\"><i class=\"material-icons left\"><span class=\"notranslate\">home</span></i>nuova ricerca</a>")


	else:
		with open("cont.html", "w") as file:
			file.write("<h1>NON ESISTE UN PERCORSO DA "+start+" A "+finish+"</h1>")
			file.write("<a class=\"waves-effect waves-light btn-large\" onclick=\"location.href='LMBN.php';\"><i class=\"material-icons left\"><span class=\"notranslate\">home</span></i>nuova ricerca</a>")
			


	redirectURL = "risultato.html"
	print('<html>')
	print('  <head>')
	print('    <meta http-equiv="refresh" content="0;url='+str(redirectURL)+"?&vista="+str(vista)+'" />')
	print('  </head>')
	print('</html>')
	#<input type=\"button\" onclick=\"location.href='LMBN.php';\" value=\"nuova ricerca\" />