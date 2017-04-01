<?php
session_start();
require_once 'controller/controller.php';
require_once 'model/model-index.php';
require_once 'view/view.php';

(new view())->viewContent();