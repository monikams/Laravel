  @if($errors->any())        
        <!--{{var_dump($errors)}};-->
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        