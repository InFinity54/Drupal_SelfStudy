<?php
namespace Drupal\card_upgrader\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 */
class SettingsForm extends ConfigFormBase {
    /**
     * Get form ID.
     * @return string ID of current form.
     */
    public function getFormId() {
        return 'card_upgrader_settings';
    }

    /**
     * Create the form.
     * @return array Content of the form.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('card_upgrader.cardupgradersettings');

        // value example : #ff0000
        $form["card_color"] = [
            '#type' => 'color',
            '#title' => $this->t("Couleur"),
            '#default_value' => $config->get('card_color')
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Enregistrer'),
        ];

        return $form;
    }

    /**
     * Check and validate data from submitted form.
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $formValues = $form_state->getValues();

        if ($formValues['card_color'] === '') {
            $form_state->setErrorByName('card_color', 'Vous devez renseigner une couleur.');
        }

        parent::validateForm($form, $form_state);
    }

    /**
     * Processing of data from the form and save them in database.
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        parent::submitForm($form, $form_state);

        $this->configFactory->getEditable('card_upgrader.cardupgradersettings')
            ->set('card_color', $form_state->getValue('card_color'))
            ->save();
    }

    /**
     * Set the name of plugin's configuration.
     * @return array Name of plugin's configuration.
     */
    protected function getEditableConfigNames() {
        return [
            'card_upgrader.cardupgradersettings'
        ];
    }
}