<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 22.04.2018
 * Time: 19:24
 */
class QueryMap {

    const DB_PREFIX = 'pj_';

    const SELECT_TOTAL = "SELECT count(id) as 'total' FROM ".QueryMap::DB_PREFIX."main";
}



