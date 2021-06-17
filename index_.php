<?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные с твоего хука
    $json = file_get_contents('php://input');

    // декодируем json
    $object = json_decode($json);

    // комната ожидания валидного json
    if (json_last_error() !== JSON_ERROR_NONE) {
        die(header('HTTP/1.0 415 Unsupported Media Type'));
    }

    /**
     * Можно сделать всё, что угодно с объектом, который распарсился выше, структура будет типа:
     * $object->ключ
     * $object->ключ->итем[ключ][ключ]
     */
    // здесь делаю дамп в файл, в корень сайта, чтобы посмотреть что реально приходит
    file_put_contents('callback.test.txt', print_r($object, true));
}
die();
