<?php

namespace App\Core;

use Throwable;

class Validator
{
  public array $errors = [];

  public function validate(array $data, array $schema)
  {
    if (empty($data) || empty($schema)) {
      return true;
    }

    foreach ($data as $key => $value) {
      // -------- Trim value to prevent starting and ending spaces --------
      $trimmedValue = trim($value);

      // -------- Check if exists a rule for given key in schema --------
      if (key_exists($key, $schema)) {

        foreach ($schema[$key] as $rule) {

          $ruleParam = null;
          $ruleName = null;

          if (str_starts_with($rule, 'passwordsMatch')) {
            if (str_contains($rule, ':')) {
              $fieldToCompare = explode(':', $rule)[1];

              if (key_exists($fieldToCompare, $data)) {
                $trimmedValueToCompare = trim($data[$fieldToCompare]);

                $result = $this->passwordsMatch($trimmedValue, $trimmedValueToCompare);

                if (is_string($result)) {
                  $this->errors[$key][] = $result;
                }
              }
            }
          } else {
            if (str_contains($rule, ':')) {
              $ruleWithParam = explode(':', $rule);

              $ruleName = $ruleWithParam[0];
              $ruleParam = $ruleWithParam[1];
            } else {
              $ruleName = $rule;
            }

            // -------- Check if rule exists --------
            if (method_exists($this, $ruleName)) {

              try {
                $result = $ruleParam !== null
                  ? call_user_func([$this, $ruleName], $key, $trimmedValue, $ruleParam)
                  : call_user_func([$this, $ruleName], $key, $trimmedValue);

                if (is_string($result)) {
                  $this->errors[$key][] = $result;
                }
              } catch (Throwable $err) {
              }
            } else {
              $this->errors[$key][] = "{$ruleName} is not a valid rule";
            }
          }
        }
      }
    }

    if (empty($this->errors)) {
      return ['success' => true];
    } else {
      return [
        'success' => false,
        'errors' => $this->errors
      ];
    }
  }

  protected function required(string $key, string $value)
  {
    return !$value
      ? "{$key} is required"
      : true;
  }

  protected function string(string $key, string $value)
  {
    return is_string($value)
      ? true
      : "{$key} must be a string";
  }

  protected function number(string $key, int $value)
  {
    return is_numeric($value)
      ? true
      : "{$key} must be a number";
  }

  protected function email(string $key, string $value)
  {

    return filter_var($value, FILTER_VALIDATE_EMAIL)
      ? true
      : "{$key} must be a valid email";
  }

  protected function minLength(string $key, string $value, int $param = 0)
  {
    return strlen($value) >= $param
      ? true
      : "{$key} must be at least of {$param} characters long";
  }

  protected function maxLength(string $key, string $value, int $param = -1)
  {
    if ($param < 0) return true;

    return strlen($value) <= $param
      ? true
      : "{$key} must be at most of {$param} characters long";
  }

  protected function passwordsMatch(string $value, string $valueToCompare)
  {
    return $value === $valueToCompare
      ? true
      : "Passwords don't match";
  }
}
