@extends('layout.app')
@section('content')
    {{-- content here --}}

    <div class="row">
            <h2 class="col-12 col-sm-8 col-md-6 col-xl-4 text-center mx-auto mt-5">Get Your Free Comparitive Market Analysis</h2>
    </div>
    <div class="row">   
        
        <div class="request-form col-12 col-sm-8 col-md-6 col-xl-4 text-center jumbotron jumbotron-fluid bg-gradient bg-gradient-primary rounded border shadow p-4 mx-auto mt-3">
            
            @if(session('submitted'))
                <div id="submitted-alert" class="text-center alert alert-success text-center mx-auto">
                    Thanks! Your information was received.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                    setTimeout(function(){
                        $('#submitted-alert').alert('close');
                    }, 3000);
                </script>
            @endif

            <form id="quoteForm" method="POST" autocomplete="off" action="/updateOrCreateLead" accept-charset="UTF-8">


                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $id }}" />

                <div class="form-group">
                    <label class="sr-only" for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control form-control-lg" />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control form-control-lg" />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" />
                    <div class="invalid-feedback">Please enter a valid email address</div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="phone">Phone</label>
                    <input type="phone" id="phone" name="phone" placeholder="Phone Number" class="form-control form-control-lg" />
                    <div class="invalid-feedback">Please enter a valid phone number</div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="address">Address</label>
                    <textarea type="address" id="address" name="address" placeholder="Address" class="form-control form-control-lg" ></textarea>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="sqft">Home Square Feet</label>
                    <input type="number" id="sqft" name="sqft" placeholder="Home Square Feet" class="form-control form-control-lg" />
                </div>
                
                <div class="btn-group btn-group-lg" role="group" aria-label="Form buttons">
                    <button type="submit" class="btn btn-secondary">Request a Quote</button>
                    <button type="reset" class="btn">Reset</button>
                </div>

            </form>
        </div>
    </div>
@endsection