<?php

class Images {

    private $arquivo;

    public function __construct($arquivo) {
        $this->uploadImage($arquivo);
    }

    private function uploadImage($arquivo) {
        /*         * ****
         * Upload de imagens
         * **** */

        // verifica se foi enviado um arquivo
        if (isset($arquivo['name']) && $arquivo['error'] == 0) {
            //echo 'Você enviou o arquivo: <strong>' . $arquivo['name'] . '</strong><br />';
            //echo 'Este arquivo é do tipo: <strong > ' . $arquivo['type'] . ' </strong ><br />';
            //echo 'Temporáriamente foi salvo em: <strong>' . $arquivo['tmp_name'] . '</strong><br />';
            //echo 'Seu tamanho é: <strong>' . $arquivo['size'] . '</strong> Bytes<br /><br />';

            $arquivo_tmp = $arquivo['tmp_name'];
            $nome = $arquivo['name'];

            // Pega a extensão
            $extensao = pathinfo($nome, PATHINFO_EXTENSION);

            // Converte a extensão para minúsculo
            $extensao = strtolower($extensao);

            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid(time()) . '.' . $extensao;

                // Concatena a pasta com o nome
                $destino = 'assets/images/product/' . $novoNome;
                $this->arquivo = $destino;
                // tenta mover o arquivo para o destino
                if (@move_uploaded_file($arquivo_tmp, $destino)) {
                    //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                    //echo ' <img src="' . $destino . '" />';
                } else {
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
                }
            } else {
                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
            }
        } else {
            echo 'Você não enviou nenhum arquivo!';
        }
    }

    public function getArquivo() {
        return $this->arquivo;
    }

}
