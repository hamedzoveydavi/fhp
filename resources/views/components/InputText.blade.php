{{--
</label>
<label class="field a-field a-field_a3">
    <input class="field__input a-field__input" name="{{$name}}" placeholder="{{$placeholder}}" required>
    <span class="a-field__label-wrap">

    </span>
</label>--}}



    <input style="border-color: black" type="text" class="input input__icon  form-control  @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}">
@error('{{ $name }}')
<span class="invalid-feedback" role="alert">
          <strong>{{ message }}</strong>
          </span>
@enderror
