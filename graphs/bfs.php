<?php

/**
 * Graph Breadth First Search.
 *   Breath first search is an approach of passing through all 
 *   the neighbors of the node first, and then go to the next level.
 *
 * Algorithm:
 *  Initially we mark all vertices as unvisited. A common approach is to create 
 *  an empty queue where we put the vertices level by level, starting with the initial vertex.
 * 
 * Performance:
 *   The complexity of this algorithm clearly is O(n + m).
 */

class Graph {

  protected $visited = [];
  protected $queue = [];
  protected $matrix = [];
  protected $length = 0;

  public function __construct(array $matrix) {
    $this->matrix = $matrix;
    $this->length = count($this->matrix);
    $this->visited = array_fill(0, $this->length, 0);
  }

  public function breadthFirst(int $initial_vertex) {
    array_push($this->queue, $initial_vertex);
    $this->visited[$initial_vertex] = 1;
    echo $initial_vertex . "\n";
    while (count($this->queue)) {
      $t = array_shift($this->queue);
      foreach ($this->matrix[$t]  as $key => $vertex) {
        if (!$this->visited[$key] && $vertex == 1) {
          $this->visited[$key] = 1;
          array_push($this->queue, $key);
          echo $key . "\t";
        }
      }
      echo "\n";
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
$search->breadthFirst(5);
