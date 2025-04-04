<?php
declare(strict_types=1);

namespace Core\Models;

interface Model {
  public function find(int $id);
  public function all();
  // TODO: Add methods:
  // create()
  // delete()
  // update()
}
