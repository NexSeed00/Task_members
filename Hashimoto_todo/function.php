<?php
// 関数を作るファイル
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
