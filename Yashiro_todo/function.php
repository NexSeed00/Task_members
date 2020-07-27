<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// indexの表示部分に適応させる
// requireして呼び出し
