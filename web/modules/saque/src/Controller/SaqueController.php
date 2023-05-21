<?php

namespace Drupal\saque\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RequestStack;

class SaqueController extends ControllerBase {
  public function resultado($valor_sacado = NULL) {

    if ($valor_sacado == NULL) {
      
      $build = [
        '#markup' => $this->t('Erro: valor não informado!'),
      ];
    }

    $valor = intval($valor_sacado);

    $numero_notas_100 = 0;
    $numero_notas_50 = 0;
    $numero_notas_20 = 0;
    $numero_notas_10 = 0;
    $numero_notas_5 = 0;
    $numero_notas_2 = 0;
    $numero_notas_1 = 0;

    if ($valor >= 100) {
      $numero_notas_100 = intval($valor / 100);
      $valor = $valor - ($numero_notas_100 * 100);
    }

    if ($valor >= 50) {
      $numero_notas_50 = intval($valor / 50);
      $valor = $valor - ($numero_notas_50 * 50);
    }

    if ($valor >= 20) {
      $numero_notas_20 = intval($valor / 20);
      $valor = $valor - ($numero_notas_20 * 20);
    }

    if ($valor >= 10) {
      $numero_notas_10 = intval($valor / 10);
      $valor = $valor - ($numero_notas_10 * 10);
    }

    if ($valor >= 5) {
      $numero_notas_5 = intval($valor / 5);
      $valor = $valor - ($numero_notas_5 * 5);
    }

    if ($valor >= 2) {
      $numero_notas_2 = intval($valor / 2);
      $valor = $valor - ($numero_notas_2 * 2);
    }

    if ($valor >= 1) {
      $numero_notas_1 = intval($valor / 1);
      $valor = $valor - ($numero_notas_1 * 1);
    }

    $build = [
      '#markup' => $this->t('
        Valor sacado: R$ ' . $valor_sacado . '<br>
        Quantidade de cédulas: ' . ($numero_notas_100 + $numero_notas_50 + $numero_notas_20 + $numero_notas_10 + $numero_notas_5 + $numero_notas_2 + $numero_notas_1) . '<br>
        Distribuição de cédulas:<br>'. 
        $numero_notas_100 . ' nota(s) de R$ 100,00<br>' .
        $numero_notas_50 . ' nota(s) de R$ 50,00<br>' .
        $numero_notas_20 . ' nota(s) de R$ 20,00<br>' .
        $numero_notas_10 . ' nota(s) de R$ 10,00<br>' .
        $numero_notas_5 . ' nota(s) de R$ 5,00<br>' .
        $numero_notas_2 . ' nota(s) de R$ 2,00<br>' .
        $numero_notas_1 . ' nota(s) de R$ 1,00<br>'
      )];

    return $build;
  }
}