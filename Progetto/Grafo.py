from collections import defaultdict

from Main import moto

global andi
andi=moto
class Graph():
	
    def __init__(self):
        
        """
        self.edges is a dict of all possible next nodes
        e.g. {'X': ['A', 'B', 'C', 'E'], ...}
        self.weights has all the weights between two nodes,
        with the two nodes as a tuple as the key
        e.g. {('X', 'A'): 7, ('X', 'B'): 2, ...}
        """
        self.edges = defaultdict(list)
        self.weights = {}
		
    def add_edge(self, from_node, to_node, weight, handi):
        # Note: assumiamo di avere nodi monodirezionali
        #
			
        self.edges[from_node].append(to_node)
        #print(andi)
        if(str(andi)=="yes"):

            self.weights[(from_node, to_node)] = int(weight)+int(handi)
        else:
            self.weights[(from_node, to_node)] = int(weight)

graph = Graph()

with open('data/grafo.txt', 'r') as f:
	
	edges = [tuple(map(str, i.split(','))) for i in f]
	
	edges = [(a, b, c, g) for a, b, c, d, e, f, g in edges] #rimuove da ogni riga gli elementi non utili al grafo 

for edge in edges:
    graph.add_edge(*edge)