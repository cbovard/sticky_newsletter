<?php

namespace Drupal\sticky_newsletter\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class StickyNewsletterSettingsForm extends ConfigFormBase {

  protected function getEditableConfigNames() {
    return ['sticky_newsletter.settings'];
  }

  public function getFormId() {
    return 'sticky_newsletter_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sticky_newsletter.settings');

    $form['display_count'] = [
      '#type' => 'number',
      '#title' => $this->t('Display Count'),
      '#description' => $this->t('Number of times to display the newsletter block.'),
      '#default_value' => $config->get('display_count'),
      '#min' => 1,
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('sticky_newsletter.settings')
      ->set('display_count', $form_state->getValue('display_count'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
