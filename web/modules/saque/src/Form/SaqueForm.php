<?php

namespace Drupal\saque\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Saque form.
 */
class SaqueForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'saque_saque';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insira a quantia a ser sacada:'),
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Clique aqui para sacar!'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!ctype_digit($form_state->getValue('value'))){
      $form_state->setErrorByName('value', $this->t('O valor do saque deve ser um número inteiro!'));
    }

    if ($form_state->getValue('value') <= 0){
      $form_state->setErrorByName('value', $this->t('O valor do saque deve ser maior que zero!'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $value = $form_state->getValue('value');

    $form_state->setRedirect('saque.saque_resultado', ['valor_sacado' => $value]);
  }
}
