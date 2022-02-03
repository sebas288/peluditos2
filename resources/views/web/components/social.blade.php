<div class="social">
    <ul>       
      <li><a href="{{ $company->instagram }}" target="_blank"><img src="{{asset('images/instagram.png')}}"></a></li>
      <li><a href="{{ $company->facebook }}" target="_blank" class="icon"><img src="{{asset('images/facebook.png')}}"></a></li>
      <li><a href="https://api.whatsapp.com/send?phone=+57{{ $company->phone }}}}x&text=%C2%A1Hola" target="_blank" class="icon"><img src="{{asset('images/whatsapp.png')}}"></a></li>
    </ul>
  </div>