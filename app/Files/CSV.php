<?php

namespace App\Files;

class CSV
{
    /**
     * Método responsável por ler arquivo CSV
     * @param string $file
     * @param boolean $head
     * @param string $delimiter
     * @return array
     */
    public static function readFile($file, $head = true, $delimiter = ';'): array
    {

        $extension = explode('.', $file);
        #VERIFICA SE O ARQUIVO EXISTE
        if (!file_exists($file)) {
            die("Arquivo não encontrado\n");
        } elseif ($extension[1] != "csv") {
            die("Arquivo não é compatível\n");
        }

        #DADOS DAS LINHAS DO ARQUIVO
        $data = [];

        #ABRE O ARQUIVO CSV
        $csv = fopen($file, 'r');

        #CABEÇALHO DOS DADOS 
        $data_head = $head ? fgetcsv($csv, 0, $delimiter) : [];

        // echo '<pre>';
        // print_r($data_head);
        // echo '</pre>';
        // exit;

        #LAÇO PARA LER CADA LIHA DO ARQUIVO
        while ($ln = fgetcsv($csv, 0, $delimiter)) {
            #COMBINA CABEÇALHO COM VALORES DO ARQUIVO
            $data[] = $head ? array_combine($data_head, $ln) : $ln;
        }

        #FECHAR O ARQUIVO
        fclose($csv);

        #RETORNA DADOS PROCESSADOS
        return $data;
    }

    /**
     * Metódo responsável por criar arquivo CSV
     * @param string $file
     * @param array $data
     * @param string $delimiter
     * @return boolean
     */
    public static function createFile($file, $data, $delimiter = ';'): bool
    {
        #ABRE O ARQUIVO PARA ESCRITA
        $csv = fopen($file, 'w');

        #CRIA O CORPO DO ARQUIVO CSV
        foreach ($data as $ln) {
            fputcsv($csv, $ln, $delimiter);
        }
        #FECHAR O ARQUIVO
        fclose($csv);

        #RETORNO DE SUCESSO
        return true;
    }
}
