<?php

/**
 * Graph Depth-First Search.
 *   Depth-first search is an algorithm that by given starting and target node, 
 *   finds a path between them. We can use DFS also to walk through all the 
 *   vertices of a graph, in case the graph is connected.
 *
 * Algorithm:
 *  Pick up a vertex that isn’t visited yet and mark it visited;
 *  Go to its first non-visited successor and mark it visited;
 *  If all the successors of the vertex are already visited or it doesn’t have successors – go back to its parent;
 * 
 * Performance:
 *   By using an adjacency matrix we need n^2 space for a graph with n vertices. 
 *   We also use an additional array to mark visited vertices, which requires additional space of n
 *   Thus the space complexity is O(n^2).
 *   When it comes to time complexity since we have a recursion and we try visiting all
 *   the vertices on each step, the worst-case time is yet again O(n^2)
 */

class Graph {

  protected $visited = [];
  protected $matrix = [];
  protected $length = 0;

  public function __construct(array $matrix) {
    $this->matrix = $matrix;
    $this->length = count($this->matrix);
    $this->visited = array_fill(0, $this->length, 0);
  }

  public function depthFirst(int $vertex) {
    $this->visited[$vertex] = 1;
    echo $vertex . "\n";
    for ($i = 0; $i < $this->length; $i++) {
      if ($this->matrix[$vertex][$i] == 1 && !$this->visited[$i]) {
        $this->depthFirst($i);
      }
    }
  }

}

$matrix = [
  [0, 1, 1, 0, 0, 0],
  [1, 0, 0, 1, 0, 0],
  [1, 0, 0, 1, 1, 1],
  [0, 1, 1, 0, 1, 0],
  [0, 0, 1, 0, 0, 1],
  [0, 0, 1, 0, 1, 0],
];

$search = new Graph($matrix);
$search->depthFirst(5);
