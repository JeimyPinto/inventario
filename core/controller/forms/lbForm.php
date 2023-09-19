<?php

class lbForm {
    private $fields = [];

    public function addField($name, $field) {
        $this->fields[$name] = $field;
    }

    public function render($fieldName) {
        if (isset($this->fields[$fieldName])) {
            return $this->fields[$fieldName]->render();
        }
        return '';
    }

    public function label($fieldName) {
        if (isset($this->fields[$fieldName])) {
            return $this->fields[$fieldName]->renderLabel();
        }
        return '';
    }

    public function getField($name) {
        if (isset($this->fields[$name])) {
            $field = $this->fields[$name]->getType();
            $field->setName($name);
            return $field;
        }
        return null;
    }
}
