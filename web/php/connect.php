<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2018/12/18
 * Time: 23:09
 */
require_once('config.php');
$mysqli = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
$mysqli->query('set names utf8');