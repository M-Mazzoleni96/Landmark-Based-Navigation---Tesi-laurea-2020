
def dijsktra(graph, initial, end):
    global total_weight
    global pesi
    # shortest paths is a dict of nodes
    # whose value is a tuple of (previous node, weight)
    shortest_paths = {initial: (None, 0)}
    current_node = initial
    visited = set()
    total_weight = 0
    pesiParz = []
    pesi = []
    while current_node != end:
        visited.add(current_node)
        destinations = graph.edges[current_node]
        weight_to_current_node = shortest_paths[current_node][1]

        for next_node in destinations:
            weight = graph.weights[(current_node, next_node)] + weight_to_current_node
            if next_node not in shortest_paths:
                shortest_paths[next_node] = (current_node, weight)
            else:
                current_shortest_weight = shortest_paths[next_node][1]
                if current_shortest_weight > weight:
                    shortest_paths[next_node] = (current_node, weight)

        next_destinations = {node: shortest_paths[node] for node in shortest_paths if node not in visited}
        if not next_destinations:
            return "inesistente"
        # next node is the destination with the lowest weight
        current_node = min(next_destinations, key=lambda k: next_destinations[k][1])
    # Work back through destinations in shortest path
    path = []


    total_weight = shortest_paths[current_node][1]
    while current_node is not None:
        path.append(current_node)
        pesiParz.append(shortest_paths[current_node][1])
        next_node = shortest_paths[current_node][0]
        current_node = next_node
    # Reverse path
    path = path[::-1]
    pesiParz = pesiParz[::-1]
    i = 0
    pesilen = len(pesiParz)
    while (pesilen > i + 1):
        pesi.append(pesiParz[i + 1] - pesiParz[i])
        i += 1
    return path