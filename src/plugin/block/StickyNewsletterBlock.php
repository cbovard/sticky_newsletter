<?php

namespace Drupal\sticky_newsletter\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Sticky Newsletter block.
 *
 * @Block(
 *   id = "sticky_newsletter_block",
 *   admin_label = @Translation("Sticky Newsletter"),
 * )
 */
class StickyNewsletterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('sticky_newsletter.settings');
    $display_count = $config->get('display_count');

    return [
      '#theme' => 'sticky_newsletter',
      '#attached' => [
        'library' => ['sticky_newsletter/sticky_newsletter'],
        'drupalSettings' => [
          'stickyNewsletter' => [
            'displayCount' => $display_count,
          ],
        ],
      ],
    ];
  }
}
