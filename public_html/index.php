<?phprequire_once('includes/config.php');if (!$baseURL[1]) {    $smarty->assign('title', 'Bem Vindo');    $smarty->display('index.tpl');} else {    switch ($baseURL[1]) {        case 'vestibular':            header('HTTP/1.1 301 Moved Permanently');            header('LOCATION: http://faculdade.' . str_replace('www.', '', $dominio) . '/vestibular');            break;        case 'admin':            include('admin.php');        case 'curso-inscricao':            include('cruso-inscricao.php');        default:            $smarty->assign('title', 'Bem Vindo');            $smarty->display('index.tpl');            break;    }}