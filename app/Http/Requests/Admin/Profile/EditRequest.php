<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|string|max:10',
      'email' => 'required|email',
      'password' => 'nullable|string|min:3',
    ];
  }

  public function withValidator($validator)
  {
    $validator->after(function ($validator) {
      if (!$this->checkUserPassword()) {
        $validator->errors()
          ->add(
            'current_password',
            __('validation.invalid_password')
          );
      }
    });
  }

  protected function checkUserPassword()
  {
    return \Hash::check(
      $this->post('current_password'),
      \Auth::user()->password
    );
  }
}
