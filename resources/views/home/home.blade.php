@extends('layout.app')
@section('content')
    {{-- content here --}}
    <div class="row">
        <div class="request-form col-12 col-md-9 col-xl-6 text-center jumbotron jumbotron-fluid bg-gradient bg-gradient-primary rounded border shadow p-4 mx-auto mt-5">
            <form id="quoteForm"  autocomplete="off">
                
                <input type="hidden" name="id" value="" />

                <div class="form-group">
                    <label class="sr-only" for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control form-control-lg" />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control form-control-lg" />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" />
                    <div class="invalid-feedback">Please enter a valid email address</div>
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
                    <button type="submit" class="btn btn-primary">Request a Quote</button><button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </form>
        </div>
    </div>
@endsection