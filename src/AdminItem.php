<?php

/**
 * Created by PhpStorm.
 * User: sergiovilar
 * Date: 9/23/15
 * Time: 12:41 AM
 */
class AdminItem {

  public $model;
  public $title;
  public $column = [];
  public $form = [];
  public $middleware = [];
  public $storage = 'local';
  public $grid_data = false;
  public $before_save = false;
  public $before_form = false;

  public function __construct($model) {
    $this->model = $model;
  }

  public function middleware($mid) {
    $this->middleware = $mid;
    return $this;
  }

  public function storage($storage) {
    $this->storage = $storage;
    return $this;
  }

  public function title($title) {
    $this->title = $title;
    return $this;
  }

  public function data(\Closure $cl) {
    $this->grid_data = $cl;
    return $this;
  }

  public function beforeSave(\Closure $cl) {
    $this->before_save = $cl;
    return $this;
  }

  public function beforeForm(\Closure $cl) {
    $this->before_form = $cl;
    return $this;
  }

  public function columns($cb) {
    Column::reset();
    call_user_func($cb);
    $this->column = Column::get();
    return $this;
  }

  public function form($cb) {
    FormItem::reset();
    call_user_func($cb);
    $this->form = FormItem::get();
    return $this;
  }

}
