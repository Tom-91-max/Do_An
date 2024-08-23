@extends('master.main')

@section('main')
 <!-- main-area -->
 <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">YOur profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Regiser</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    

</main>
<!-- main-area-end -->
<div style="text-align: center;">
    <h3>Customer information</h3>
</div>  
<div class="row">
    <div class="col-md-6">
            
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <td>{{ $auth->name }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $auth->phone }}</td>
                </tr>
                <tr name="gender">
                    <th>Gender</th>
                    <td value="{{ $auth->gender }}">
                        {{ $auth->gender == 1 ? 'Male' : 'Female' }}
                    </td>                                      
                </tr>                
            </thead>
        </table>
    </div>
    <div class="col-md-6">
        
        <table class="table">
            <thead>
            <tr>
                    <th>Address</th>
                    <td>{{ $auth->address }}</td>
                </tr>
                
                <tr>
                    <th>Email</th>
                    <td>{{ $auth->email }}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div style="text-align: center;">
    <a href="{{ route('account.profile') }}" class="btn btn-sm btn-primary">Click here to update your profile</a>
</div>



@stop()
