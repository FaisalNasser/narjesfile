@extends('frontend.appother')

@section('content')


<style>
    .row>div{
        padding:0px 15px;
    }
</style>
<div class="container">
            <div class="row justify-content-center" style="margin-bottom: 10px;">
                <div class="col-md-8">
                    @if(app()->getLocale() == "en")
                    <h1>
                        {!! $page->title !!}
                        </h1>
                     @elseif(app()->getLocale() == "ar")
                          <h1 style="text-align: end;">
                        {!! $page->title !!}
                       </h1>
                      @else
                           <h1>
                           {!! $page->title !!}
                           </h1>
                      @endif
                   

                {!! $page->body !!}
                </div>

</div>
</div>

                  
                
				
				

                 
  
   
@endsection