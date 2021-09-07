 @if ($errors->any())
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none'">×</button>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach

          </ul>
      </div>
  @endif
