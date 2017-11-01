<?php
namespace Core\Validation;


class Validator
{
    private $input = [];
    private $rules = [];

    private $passed = [];
    private $failed = [];

    public function __construct(array $input, array $rules)
    {
        $this->setInput($input);
        $this->setRules($rules);
    }

    private function setRules(array $rules) {
        foreach($rules as $key => $rulesSet) {
            $this->rules[$key] = $this->parseRule($rulesSet);
        }
    }

    private function setInput(array $input) {
        $this->input = array_filter($input);

    }

    private function parseRule($rulesSet){
        $rules = explode('|', $rulesSet);
        return array_map(function($rule) {
            return strpos( $rule, ':') !== FALSE ? explode(':', $rule) : $rule;
        }, $rules);
    }

    public function validate() {
        foreach($this->rules as $field => $rules) {
            $input = isset($this->input[$field]) ? $this->input[$field] : null;
            foreach($rules as $rule) {
                if(is_array($rule)) {
                    $ruleName  = $rule[0];
                    $ruleParameter  = $rule[1];
                    $validation = $this->{$ruleName}($input, $ruleParameter);
                } else {
                    $ruleName = $rule;
                    $validation = $this->$ruleName($input);
                }
                if($validation->isValid()) {
                    $this->passed[$field][] = $ruleName;
                }  else {
                    $this->failed[$field][] = $validation->getError();
                }
            }
        }
        return count($this->failed) === 0;
    }
    public function __call($name, $arguments)
    {
        $class =  '\\Core\\Validation\\Rules\\Validate'.ucfirst($name);
        $input = $arguments[0];
        $parameter = isset($arguments[1]) ? $arguments[1] : null;
        return new $class($input, $parameter);
    }

    public function getErrors() {
        return $this->failed;
    }
}