

        @if (@$is_insert)

            @if (@$is_Calendar)
                <div style="padding-bottom:8px; width: 80%" class="input-group">
                    <div class="input-group-prepend">
                        <span style="background-color: #95999c;height: 38px" class="input-group-text">{{$name}}</span>
                    </div>
                    <input style="width:400px" type="date" class="input input__icon  form-control  @error('{{ $name }}') is-invalid @enderror" name="{{$name}}">
                </div>
         @else
                    <div style="padding-bottom:8px; /*width: 80%;*/" class="input-group">
                        <div   class="input-group-prepend">
                            <span style="background-color: #95999c;height: 37px;" class="input-group-text">{{$name}}</span>
                        </div>
                           <input type="text" class="input input__icon  form-control  @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}">
                    </div>
            @endif
        @else
            @if (@$is_Calendar)
                <label for="{{ $name }}">{{ __('content.contactform.' . $name) }}</label>
                <input style="width:200px" id="{{ $name }}" value="{{ $value }}"  type="date" class="input input__icon  form-control  @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}">
                     @else
                <label for="{{ $name }}">{{ __('content.contactform.' . $name) }}</label>
                     <input style="width:200px" id="{{ $name }}" value="{{ $value }}" type="text" class="input input__icon  form-control  @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}">
                @endif
        @endif

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
          <strong>{{ message }}</strong>
          </span>
    @enderror













