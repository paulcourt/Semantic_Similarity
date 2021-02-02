import networkx as nx
from networkx.algorithms.community import k_clique_communities
import matplotlib.pyplot as plt
from pprint import pprint  # pretty-printer

graphFile='graph_file_LDA.txt' # This is a graph file that generated semantic similarity using a model. Refer the attached dummy graph file sent to you in the email
#finalGraph='finalGraph.txt' # Kept there for future expansion
G=nx.Graph()
G2=nx.DiGraph()
#LSA graph
graph_file=open(graphFile,"r")

#the following code converts text values into integer values
theints=[]
for val in graph_file.read().split():
    theints.append(int(val))

graph_file.close()

print(theints)
start_vertext=[]
end_vertex=[]
count=1 #if count=1 then start vertex and if count=2 then end vertex

source=0
while source<len(theints):
    start_vertex=theints[source]
    source=source+1
    end_vertex=theints[source]
    source=source+1
    #print(source," ",start_vertex," ",end_vertex)
    G.add_edge(start_vertex,end_vertex)

nx.draw(G)
plt.show()
pprint(G.edges())

print('################################################')
print('###################### CENTRALITY ##########################')
pprint(nx.degree_centrality(G))

print('################################################')
print('###################### CLIQUES ##########################')
pprint(list(nx.find_cliques(G)))

#pprint(list(nx.number_of_cliques(G,nodes=None, cliques=None)))

pprint('######################## K-Clique Communities ########################')
pprint(list(k_clique_communities(G,3)))      
pprint('######################## K-Core ########################')

source=0
while source<len(theints):
    start_vertex=theints[source]
    source=source+1
    end_vertex=theints[source]
    source=source+1
    #print(source," ",start_vertex," ",end_vertex)
    G2.add_edge(start_vertex,end_vertex)

G2.remove_edges_from(G2.selfloop_edges())

pprint(G2.edges())
pprint(list(nx.k_core(G2,k=5)))
graph_file.close()

    
    
