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
    const SELECT_BY_EMAIL = 'SELECT id FROM '.QueryMap::DB_PREFIX."main where email like ?";
    const SELECT_ALL_BYID = 'SELECT * FROM '.QueryMap::DB_PREFIX."main where id = ?";
    const INSERT_ROW = 'INSERT INTO '.QueryMap::DB_PREFIX.'main (id,email,contentID,title,date) VALUES (null,:email,:contentID,:title,:date)';

}



